//Esperar a cargar todo el documento
document.addEventListener("DOMContentLoaded", () => {
  
    // Agregar tarea al listado
    let agregarTarea = () => {
      // Crear una nueva fila para la tarea
      let fila = document.createElement("tr");
  
      // Rellenar la fila con los datos del formulario
      ["nombreTarea", "tiempoTarea", "fechaMaximaTarea", "fechaAltaTarea", "estadoTarea", "descripcionTarea"].forEach((campo) => {
        let celda = document.createElement("td");
        let valorCampo = document.getElementById(campo).value;
        celda.appendChild(document.createTextNode(valorCampo));
        fila.appendChild(celda);
      });
  
      // Botón para editar la tarea
      let celdaEditar = document.createElement("td");
      let botonEditar = document.createElement("button");
      botonEditar.classList.add("btn", "btn-warning", "btn-sm");
      botonEditar.textContent = "Editar";
      botonEditar.addEventListener("click", () => editarTarea(fila));
      celdaEditar.appendChild(botonEditar);
      fila.appendChild(celdaEditar);
  
      // Botón para borrar la tarea
      let celdaBorrar = document.createElement("td");
      let botonBorrar = document.createElement("button");
      botonBorrar.classList.add("btn", "btn-danger", "btn-sm");
      botonBorrar.textContent = "Borrar";
      botonBorrar.addEventListener("click", () => fila.remove());
      celdaBorrar.appendChild(botonBorrar);
      fila.appendChild(celdaBorrar);
  
      // Añadir la fila al cuerpo de la tabla
      listado.appendChild(fila);
  
      limpiarCampos();
    };
  
    // Limpiar los campos del formulario
    let limpiarCampos = () => {
      ["nombreTarea", "tiempoTarea", "fechaMaximaTarea", "fechaAltaTarea", "estadoTarea", "descripcionTarea"].forEach((campo) => {
        document.getElementById(campo).value = "";
      });
    };
  
    // Editar tarea seleccionada
    let editarTarea = (fila) => {
      let celdas = fila.querySelectorAll("td");
  
      // Cargar datos en el formulario
      document.getElementById("nombreTarea").value = celdas[0].textContent;
      document.getElementById("tiempoTarea").value = celdas[1].textContent;
      document.getElementById("fechaMaximaTarea").value = celdas[2].textContent;
      document.getElementById("fechaAltaTarea").value = celdas[3].textContent;
      document.getElementById("estadoTarea").value = celdas[4].textContent;
      document.getElementById("descripcionTarea").value = celdas[5].textContent;
  
      // Eliminar la fila de la tabla
      fila.remove();
    };
  
    // Obtener el contenedor principal
    let contenedor = document.getElementById("contenedor");
  
    // Crear título de la web
    let titulo = document.createElement("h1");
    titulo.appendChild(document.createTextNode("Administrador de tareas"));
    contenedor.appendChild(titulo);
  
    // Crear formulario
    let formulario = document.createElement("div");
  
    // Crear campos del formulario dentro array y los meto dentro para después recorrerlo
    let campos = [
      { id: "nombreTarea", label: "Nombre de la tarea", tipo: "text" },
      { id: "tiempoTarea", label: "Tiempo estimado", tipo: "time" },
      { id: "fechaMaximaTarea", label: "Fecha máxima", tipo: "date" },
      { id: "fechaAltaTarea", label: "Fecha alta", tipo: "date" },
      { id: "estadoTarea", label: "Estado", tipo: "select", opciones: ["Pendiente", "En proceso", "Finalizada"] },
      { id: "descripcionTarea", label: "Descripción", tipo: "textarea" }
    ];
  
    // Generar formulario dinámico con títulos y campos
    campos.forEach((campo) => {
      let label = document.createElement("label");
      label.textContent = campo.label;
      label.setAttribute("for", campo.id);
      formulario.appendChild(label);
  
      let input;
      if (campo.tipo === "select") {
        input = document.createElement("select");
        campo.opciones.forEach((opcion) => {
          let option = document.createElement("option");
          option.textContent = opcion;
          option.value = opcion;
          input.appendChild(option);
        });
      } else if (campo.tipo === "textarea") {
        input = document.createElement("textarea");
        input.rows = 3;
      } else {
        input = document.createElement("input");
        input.type = campo.tipo;
      }
      input.id = campo.id;
      input.classList.add("form-control", "mb-2");
      formulario.appendChild(input);
    });
    // Agregar formulario al contenedor
    contenedor.appendChild(formulario);
  
    // Botón para agregar tarea
    let botonAgregar = document.createElement("button");
    botonAgregar.textContent = "Agregar tarea";
    botonAgregar.classList.add("btn", "btn-primary");
    botonAgregar.addEventListener("click", agregarTarea);
    contenedor.appendChild(botonAgregar);
  
    // Crear tabla para listar tareas
    let tabla = document.createElement("table");
    tabla.classList.add("table", "mt-3");
  
    // Crear encabezado de la tabla
    let encabezado = document.createElement("thead");
    let filaEncabezado = document.createElement("tr");
  
    ["Nombre", "Tiempo", "Fecha máxima", "Fecha alta", "Estado", "Descripción", "Editar", "Borrar"].forEach((campo) => {
      let th = document.createElement("th");
      th.textContent = campo;
      filaEncabezado.appendChild(th);
    });
    encabezado.appendChild(filaEncabezado);
    tabla.appendChild(encabezado);
  
    // Crear cuerpo de la tabla
    let listado = document.createElement("tbody");
    tabla.appendChild(listado);
    contenedor.appendChild(tabla);
  });
  