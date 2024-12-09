// Elementos del DOM
const taskInput = document.getElementById('taskInput');
const addTaskBtn = document.getElementById('addTaskBtn');
const toggleTasksBtn = document.getElementById('toggleTasksBtn');
const taskList = document.getElementById('taskList');

// Evento para añadir una tarea
addTaskBtn.addEventListener('click', () => {
  const taskText = taskInput.value.trim(); // Elimina espacios innecesarios

  if (taskText === '') {
    alert('Por favor, escribe una tarea.');
    return;
  }

  // Crear el elemento de la tarea
  const taskItem = document.createElement('li');
  taskItem.className = 'task';
  taskItem.innerHTML = `
    <span>${taskText}</span>
    <button class="deleteBtn">Eliminar</button>
  `;

  // Añadir evento para eliminar tarea
  taskItem.querySelector('.deleteBtn').addEventListener('click', () => {
    taskList.removeChild(taskItem);
  });

  // Agregar la tarea a la lista
  taskList.appendChild(taskItem);

  // Limpiar el input
  taskInput.value = '';
});

// Evento para mostrar/ocultar tareas
toggleTasksBtn.addEventListener('click', () => {
  if (taskList.classList.contains('hidden')) {
    taskList.classList.remove('hidden');
  } else {
    taskList.classList.add('hidden');
  }
});
