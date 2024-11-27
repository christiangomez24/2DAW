let bienvenida = true;
let enPausa = true;
let menuEscapeCreado = false;

const paddle = document.getElementById("paddle");
const paddle2 = document.getElementById("paddle2");
const ball = document.getElementById("ball");
const ventana = document.getElementById("ventana");
const viewportHeight = window.innerHeight;
const altoVentanaPX = 0.9 * viewportHeight;
const viewportWidth = window.innerWidth;
const anchoVentanaPX = 0.9 * viewportWidth;

const ball_radius = 30; //window.prompt("Introduce el radio de la bola");
ball.style.width = 2*ball_radius + "px";
ball.style.height = 2*ball_radius + "px";
ball.style.borderRadius = ball_radius + "px";

var velocity_x = 10;
var velocity_y = -10;

crearVentana();  //Creo una ventana por encima del juego
anadirBienvenida(); //Añado el contenido "bienvenida" a la ventana.


// Inicializo pero no muevo la esfera
var ball_movement = 0;


function crearVentana (){
    //creo fondo
    divVentana = document.createElement('div');
    divVentana.classList.add("menu-fondo");
    document.body.appendChild(divVentana);

    //creo contenido ventana
    divVentanaContenido = document.createElement('div');
    divVentanaContenido.classList.add("menu-contenido");
    divVentana.appendChild(divVentanaContenido);
}

function anadirBienvenida (){
    console.log("Añado bienvenida");

    tituloMenu = document.createElement('h2');
    tituloMenu.innerHTML = "PONG";
    tituloMenu.setAttribute("style","text-align:center");
    divVentanaContenido.appendChild(tituloMenu);

    descripcionPong = document.createElement('p');
    descripcionPong.innerHTML = "Pong (o Tele-Pong) es un videojuego de consolas de primera generación publicado por Atari, creado por Nolan Bushnell y lanzado el 29 de noviembre de 1972.1​ Pong está basado en el deporte de tenis de mesa (o ping pong). La palabra Pong es una marca registrada por Atari Interactive, mientras que la palabra genérica «pong» es usada para describir el género de videojuegos «bate y bola». La popularidad de Pong dio lugar a una demanda de infracción de patentes y ganada por parte de los fabricantes de Magnavox Odyssey, que poseía un juego similar en el que Pong de Atari claramente se había inspirado luego de una visita de Bushnell a las oficinas de Magnavox donde vio una demostracion del mismo.";
    divVentanaContenido.appendChild(descripcionPong);

    empezar = document.createElement('button');
    empezar.innerHTML = "EMPEZAR";
    empezar.addEventListener("click", empezarPartida);
    divVentanaContenido.appendChild(empezar);
}

function empezarPartida () {
    divVentana.remove();
    crearVentana();
    anadirConfiguracionInicial();
}

function anadirConfiguracionInicial () {

    tituloMenu = document.createElement('h2');
    tituloMenu.innerHTML = "CONFIGURA LA PARTIDA";
    tituloMenu.setAttribute("style","text-align:center");
    divVentanaContenido.appendChild(tituloMenu);

    //Cantidad jugadores:

    pJugadores = document.createElement('p');
    pJugadores.innerHTML = "Selecciona la cantidad de jugadores:";
    divVentanaContenido.appendChild(pJugadores);

    radioJugador1 = document.createElement('input');
    radioJugador1.type = "radio";
    radioJugador1.value = "1";
    radioJugador1.id = "radio1";
    radioJugador1.name = "jugadores";
    radioJugador1.setAttribute("checked","");
    divVentanaContenido.appendChild(radioJugador1);

    labelJugador1 = document.createElement('label');
    labelJugador1.innerHTML = "Un jugador";
    labelJugador1.setAttribute("for","radio1");
    divVentanaContenido.appendChild(labelJugador1);

    divVentanaContenido.appendChild(document.createElement('br'));

    radioJugador2 = document.createElement('input');
    radioJugador2.type = "radio";
    radioJugador2.value = "2";
    radioJugador2.id = "radio2";
    radioJugador2.name = "jugadores";
    divVentanaContenido.appendChild(radioJugador2);

    labelJugador2 = document.createElement('label');
    labelJugador2.innerHTML = "Dos jugadores";
    labelJugador2.setAttribute("for","radio2");
    divVentanaContenido.appendChild(labelJugador2);

    divVentanaContenido.appendChild(document.createElement('br'));

    //Dificultad:

    pDificultad = document.createElement('p');
    pDificultad.innerHTML = "Dificultad:";
    divVentanaContenido.appendChild(pDificultad);

    radioFacil = document.createElement('input');
    radioFacil.type = "radio";
    radioFacil.value = "facil";
    radioFacil.id = "radioFacil";
    radioFacil.name = "radioDificultad";
    divVentanaContenido.appendChild(radioFacil);

    labelFacil = document.createElement('label');
    labelFacil.innerHTML = "Fácil";
    labelFacil.setAttribute("for","radioFacil");
    divVentanaContenido.appendChild(labelFacil);

    divVentanaContenido.appendChild(document.createElement('br'));

    radioNormal = document.createElement('input');
    radioNormal.type = "radio";
    radioNormal.value = "normal";
    radioNormal.id = "radioNormal";
    radioNormal.name = "radioDificultad";
    radioNormal.setAttribute("checked","");
    divVentanaContenido.appendChild(radioNormal);

    labelNormal = document.createElement('label');
    labelNormal.innerHTML = "Normal";
    labelNormal.setAttribute("for","radioNormal");
    divVentanaContenido.appendChild(labelNormal);

    divVentanaContenido.appendChild(document.createElement('br'));

    radioDificil = document.createElement('input');
    radioDificil.type = "radio";
    radioDificil.value = "dificil";
    radioDificil.id = "radioDificil";    
    radioDificil.name = "radioDificultad";
    divVentanaContenido.appendChild(radioDificil);

    labelDificil = document.createElement('label');
    labelDificil.innerHTML = "Dificil";
    labelDificil.setAttribute("for","radioDificil");
    divVentanaContenido.appendChild(labelDificil);

    divVentanaContenido.appendChild(document.createElement('br'));

    iniciar = document.createElement('button');
    iniciar.innerHTML = "INICIAR PARTIDA";
    iniciar.addEventListener("click", jugar);
    divVentanaContenido.appendChild(iniciar);
}

function jugar (cantidadJugadores) {
    divVentana.remove();
    enPausa = false;

    if (true){ // cantidadJugadores = 1

    } else { // cantidadJugadores = 2

    }

    //Add onkeypress handler
    document.onkeydown = pulsacion;

    // Move ball
    ball_movement = setInterval(move_ball, 25);

}

function pulsacion(pkey){
    console.log("tecla pulsada: " + pkey.which);  

   if (pkey.which == 87){ // tecla w
       paddle.style.top = (paddle.offsetTop - 10) +"px"; //subir pala
   } else if (pkey.which == 83){ // tecla s
       paddle.style.top = (paddle.offsetTop + 10) +"px"; //bajar pala
   } else if (pkey.which == 32){ //espacio
       if (enPausa==false){
           enPausa=true;
           ball_movement = clearInterval(ball_movement);
           crearVentana();
           anadirPausa();
       } else {
           enPausa=false;
           ball_movement = setInterval(move_ball, 25);
           divVentana.remove();
       }
   } else if (pkey.which == 27){ //escape
       if (enPausa==false){
           enPausa=true;
           ball_movement = clearInterval(ball_movement);
           if (menuEscapeCreado==false)
                menuEscape();
            else divVentana.setAttribute("style","display:block");
       } else {
           enPausa=false;
           ball_movement = setInterval(move_ball, 25);
           divVentana.setAttribute("style","display:none");
       }    }
}

function move_ball(){
    

    console.log(ball.offsetTop);
    console.log(altoVentanaPX);


    //Check Top
    if (ball.offsetTop <= 0) {
        velocity_y = -velocity_y;
    }

    //Check right
    if (ball.offsetLeft + ball_radius >= anchoVentanaPX) {
        velocity_x = -velocity_x;
    }

    //Check bottom
    if (ball.offsetTop + ball_radius  >= altoVentanaPX) {
        velocity_y = -velocity_y;
    }

    //Check left
    if (ball.offsetLeft <= 0) {
        clearInterval(ball_movement);
        alert ("You lose");
        location.reload();
    }

    // Check collision
    if (ball.offsetLeft - ball_radius <= 90 && ball.offsetTop<=(paddle.offsetTop+75) && ball.offsetTop>=(paddle.offsetTop-75)) {
        velocity_x = -velocity_x;
    }
    
    ball.style.top = (ball.offsetTop + velocity_y) +"px";
    ball.style.left = (ball.offsetLeft + velocity_x) +"px";

}

function anadirPausa (){
    console.log("Añado pausa");
    //Oculto el fondo  del contenido
    divVentanaContenido.setAttribute("style","background-color:rgba(0, 0, 0, 0.0)");

    tituloPausa = document.createElement('h2');
    tituloPausa.innerHTML = "PAUSA";
    tituloPausa.setAttribute("style","color:red;text-align:center");
    divVentanaContenido.appendChild(tituloPausa);

    descripcionPausa = document.createElement('p');
    descripcionPausa.innerHTML = "Estás en el menú de pausa. Para continuar vuelve a presionar la tecla espacio.";
    descripcionPausa.setAttribute("style","color:white;text-align:center");
    divVentanaContenido.appendChild(descripcionPausa);
}

function menuEscape (){
    menuEscapeCreado=true;
    //creo fondo
    divVentana = document.createElement('div');
    divVentana.classList.add("menu-fondo");
    divVentana.id = "menuEscape";
    document.body.appendChild(divVentana);

    //creo contenido ventana
    divVentanaContenido = document.createElement('div');
    divVentanaContenido.classList.add("menu-contenido");
    divVentana.appendChild(divVentanaContenido);


    console.log("Añado menu principal");

    tituloMenu = document.createElement('h2');
    tituloMenu.innerHTML = "CONFIGURACIÓN";
    tituloMenu.setAttribute("style","text-align:center");
    divVentanaContenido.appendChild(tituloMenu);

    for (let i=1; i<3; i++){
        divJugador = document.createElement('div');
        divJugador.id = "divJugador"+i;
        divVentanaContenido.appendChild(divJugador);
    
        tituloJugador = document.createElement('h3');
        tituloJugador.innerHTML = "Introduce nombre jugador"+i;
        tituloJugador.setAttribute("contenteditable", "true");
        divJugador.appendChild(tituloJugador);

        labelSubir = document.createElement('label');
        labelSubir.innerHTML = "Tecla subir ";
        labelSubir.setAttribute("for","subir"+i);
        divJugador.appendChild(labelSubir);

        inputSubir = document.createElement('input');
        inputSubir.id = "subir"+i;
        inputSubir.setAttribute("style","width:15px;");
        inputSubir.setAttribute("placeholder", "W");
        divJugador.appendChild(inputSubir);

        labelBajar = document.createElement('label');
        labelBajar.innerHTML = " Tecla bajar ";
        labelBajar.setAttribute("for","bajar"+i);
        divJugador.appendChild(labelBajar);

        inputBajar = document.createElement('input');
        inputBajar.id = "bajar"+i;
        inputBajar.setAttribute("style","width:15px;");
        inputBajar.setAttribute("placeholder", "S");
        divJugador.appendChild(inputBajar);

        labelCheckboxRaton = document.createElement('label');
        labelCheckboxRaton.setAttribute("for","mueveRaton"+i);
        labelCheckboxRaton.innerHTML = "  Jugar con la rueda del ratón";
        divJugador.appendChild(labelCheckboxRaton);


        moverConRaton = document.createElement('input');
        moverConRaton.type = "checkbox";
        moverConRaton.id = "mueveRaton"+i;
        moverConRaton.name = "mueveRaton";
        moverConRaton.setAttribute("onclick","onlyOne(this)");
        divJugador.appendChild(moverConRaton);

        divVentanaContenido.appendChild(document.createElement("br"));
    }



    // Selección de las teclas (arriba y abajo) de cada jugador o posibilidad de jugar con la rueda del ratón (solo uno de los dos jugadores).
    // Introducción del nombre/s del jugador/es
    // Activar efectos de sonido. Sonido al golpear la pelota con la pala y sonido cuando se gana/pierde punto.
    // Selección del nivel de dificultad inicial

}

function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName(checkbox.name);
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false;
    })
}