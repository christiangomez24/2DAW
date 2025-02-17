

// Una vez inicie el juego comenzará un bucle que solo finalizará al perder.
// Dentro del bucle habrá un numero aleatorio y conforme a eso un 
// switch en el que cada caso será la programación de los botones para encenderlos.
// A medida que el juego progresa se sumará +1 la cantidad de veces a correr el bucle.
// Debe haber una variable fuera contando el numero de rondas y otra dentro repitiendo el bucle
// para comparar si es correcto lo del usuario vs la máquina se crearán 2 arrays.
// El indice de cada array será el orden de encendido y dentro se almacenará el valor.
// Al terminar se comparará el array y se indicará que es erroneo o acertado.
// Esto tiene un problema y es que solo se comprobará al final y no al momento de fallar.
// Quizá se pueda realizar la comprobación dentro del bucle cada vez que el usuario presiona el botón.


  document.addEventListener('DOMContentLoaded', function() {

    const rojo = document.getElementById("rojo");
    const verde = document.getElementById("verde");
    const amarillo = document.getElementById("amarillo");
    const azul = document.getElementById("azul");
    const tbodyTablaResultados = document.getElementById("tablaResultados").getElementsByTagName("tbody")[0];
    const borrarBoton = document.getElementById("borrar");

    //Inicio local storage
    const tablaPuntuacionLocalStorage = window.localStorage;

    //Compruebo si hay datos en local storage
    //Si no hay datos en local storage setearlos.
    // if (tablaPuntuacionLocalStorage.getItem("puntuacion") === null) {
    //     tablaPuntuacionLocalStorage.setItem("puntuacion", "0");
    //     tablaPuntuacionLocalStorage.setItem("iniciales", "");
    // }
    // //Si hay datos en local storage imprimirlos.
    // else {

    //     imprimirDatosTabla();

    // }

    if (tablaPuntuacionLocalStorage.getItem("jugadores") === null) {
      console.log("No hay datos en local storage");
      jugadores = [
        //{nombre: "Jugador 1", puntuacion: 0, fecha: "2021-06-01 12:00:00"},
        {nombre: "", puntuacion: 0, fecha: ""}
      ];

      tablaPuntuacionLocalStorage.setItem("jugadores", JSON.stringify(jugadores));

  } else {
      console.log("Hay datos en local storage");
      jugadores = JSON.parse(tablaPuntuacionLocalStorage.getItem("jugadores"));
      console.log(jugadores);
      imprimirDatosTabla();
  }






    
    //fecha actual al momento de ejecutar la función.
    function fechaActual(){
      const today = new Date();
      const yyyy = today.getFullYear();
      let mm = today.getMonth() + 1; // Months start at 0!
      let dd = today.getDate();
      let hh = today.getHours();
      let min = today.getMinutes();
      let sec = today.getSeconds();

      if (dd < 10) dd = '0' + dd;
      if (mm < 10) mm = '0' + mm;
      if (hh < 10) hh = '0' + hh;
      if (min < 10) min = '0' + min;
      if (sec < 10) sec = '0' + sec;

      const fechaActual = yyyy + '-' + mm + '-' + dd + " "+hh+":"+min+":"+sec;
      return fechaActual;
    }

    //Imprimir datos en la tabla (al iniciar y al morir)
    function imprimirDatosTabla(){
        nuevaFila = tbodyTablaResultados.insertRow();
        posicion = nuevaFila.insertCell(); //1a celda
        nombre = nuevaFila.insertCell(); //2a celda
        racha = nuevaFila.insertCell(); //3a celda
        fecha = nuevaFila.insertCell(); //4a celda

        jugadores.forEach(jugador => {
            nombre.appendChild(document.createTextNode(jugador.nombre));
            racha.appendChild(document.createTextNode(jugador.puntuacion));
            fecha.appendChild(document.createTextNode(jugador.fecha));          
        });



        // //recojo los datos de puntuación almacenados en local storage
        // puntuacion = document.createTextNode(jugadores[0].puntuacion);
        // //recojo la fecha almacenada en local storage
        // imprimirFecha = document.createTextNode(jugadores[0].fecha);
        // //recojo las iniciales almacenadas en local storage
        // inicialesJugador = document.createTextNode(jugadores[0].nombre);
        

        // racha.appendChild(puntuacion); //La puntuación recogida se inserta en la celda "racha"
        // fecha.appendChild(imprimirFecha); //La fecha recogida se inserta en la celda "fecha"
        // nombre.appendChild(inicialesJugador); //Las iniciales recogidas se insertan en la celda "nombre"
    }





    function iniciarJuego() {
        tablaPuntuacionLocalStorage.setItem(JSON.stringify(jugadores[0].nombre), document.getElementById("iniciales").value);
        myModal.remove();


        //GUARDAR PUNTUACIÓN

        rojo.addEventListener("click", function(){
    
          tablaPuntuacionLocalStorage.setItem("jugadores", JSON.stringify(jugadores));

            puntuacion = tablaPuntuacionLocalStorage.getItem("puntuacion");
            puntuacion++;
            tablaPuntuacionLocalStorage.setItem("puntuacion", puntuacion);
            console.log(puntuacion);
            console.log(tablaPuntuacionLocalStorage);
            tablaPuntuacionLocalStorage.setItem("fecha", fechaActual());

            imprimirDatosTabla();

        });




    let opacity = 0.99;      // Opacidad inicial
    let disminuyendo = true; // Bandera para saber si se disminuye la opacidad

    setInterval(() => {
      // Ajustamos la opacidad en pasos pequeños
      if (disminuyendo) {
        opacity -= 0.05;
        if (opacity <= 0.6) { // Límite inferior
          opacity = 0.6;
          disminuyendo = false;
        }
      } else {
        opacity += 0.05;
        if (opacity >= 0.99) { // Límite superior
          opacity = 0.99;
          disminuyendo = true;
        }
      }
      rojo.style.opacity = opacity;
    }, 50); // Actualiza cada 50 milisegundos para un efecto suave



    };


    //PREGUNTAR EL NOMBRE AL USUARIO
    // Al inicio del juego debo preguntar el nombre con un modal
    // para (en caso de que lo haya introducido anteriormente)
    // poder recogerlo pero que sea editable en caso de jugar otra persona.
    // El botón que confirmará el nombre dará comienzo la partida.
    function crearPantallaInicio() {
        inicialesJugador = jugadores[0].nombre;
        // Creación div myModal
        myModal = document.createElement('div');
        myModal.id = "myModal";
        myModal.classList.add("modal");
        document.body.appendChild(myModal);

        // Creación div modal-content
        modalContent = document.createElement('div');
        modalContent.classList.add("modal-content");
        modalContent.innerHTML = `
            <h2>Simon Dice</h2>
            <p>Introduce tus iniciales para empezar a jugar:</p>
            <input type="text" id="iniciales" maxlength="6" value="${inicialesJugador}">
            <button id="btnJugar">Jugar</button>`;
        myModal.appendChild(modalContent);

        document.getElementById('btnJugar').addEventListener('click', iniciarJuego);

    }

    //--------------------INICIO JUEGO--------------------//
    crearPantallaInicio();


    //BORRAR PUNTUACIÓN
    borrarBoton.addEventListener("click", function(){
        const tablaPuntuacionLocalStorage = window.localStorage;
        tablaPuntuacionLocalStorage.clear();
    });

  });