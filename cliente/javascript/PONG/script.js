let enPausa = true;
crearVentana();
anadirBienvenida();


const paddle = document.getElementById("paddle");
const ball = document.getElementById("ball");
const ventana = document.getElementById("ventana");
console.log(ventana.innerWidth);

const ball_radius = 0;

var velocity_x = 5;
var velocity_y = 5;

//Add onkeypress handler
document.onkeydown = pulsacion;

// Move ball
//var ball_movement = setInterval(move_ball, 10);

function move_ball(){
    

    //console.log(ball.offsetTop);
    //console.log(ventana.innerHeight);


    //Check Top
    if (ball.offsetTop - ball_radius <= 0) {
        velocity_y = -velocity_y;
    }

    //Check right
    if (ball.offsetLeft + ball_radius >= ventana.innerWidth) {
        velocity_x = -velocity_x;
    }

    //Check bottom
    if (ball.offsetTop+ ball_radius  >= ventana.innerHeight) {
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
            ball_movement = setInterval(move_ball, 10);
            divVentana.remove();
        }
    } else if (pkey.which == 27){ //escape
        if (enPausa==false){
            enPausa=true;
            ball_movement = clearInterval(ball_movement);
            crearVentana();
            anadirMenu();
        } else {
            enPausa=false;
            ball_movement = setInterval(move_ball, 10);
            divVentana.remove();
        }    }
}

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

function anadirMenu (){
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
        tituloJugador.innerHTML = "Jugador"+i;
        tituloJugador.setAttribute("contenteditable", "true");
        divJugador.appendChild(tituloJugador);

        labelSubir = document.createElement('label');
        labelSubir.innerHTML = "Tecla subir";
        labelSubir.setAttribute("for","subir"+i);
        divJugador.appendChild(labelSubir);

        inputSubir = document.createElement('input');
        inputSubir.id = "subir"+i;
        inputSubir.setAttribute("placeholder", "W");
        divJugador.appendChild(inputSubir);

        labelBajar = document.createElement('label');
        labelBajar.innerHTML = "Tecla bajar";
        labelBajar.setAttribute("for","bajar"+i);
        divJugador.appendChild(labelBajar);

        inputBajar = document.createElement('input');
        inputBajar.id = "bajar"+i;
        inputBajar.setAttribute("placeholder", "S");
        divJugador.appendChild(inputBajar);
    }



    // Selección de las teclas (arriba y abajo) de cada jugador o posibilidad de jugar con la rueda del ratón (solo uno de los dos jugadores).
    // Introducción del nombre/s del jugador/es
    // Activar efectos de sonido. Sonido al golpear la pelota con la pala y sonido cuando se gana/pierde punto.
    // Selección del nivel de dificultad inicial

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

    labelJugadores = document.createElement('label');
    labelJugadores.innerHTML = "Número de jugadores: 1";
    divVentanaContenido.appendChild(labelJugadores);

    rangeJugadores = document.createElement('input');
    rangeJugadores.type = "range";
    rangeJugadores.min = "1";
    rangeJugadores.max = "2";
    divVentanaContenido.appendChild(rangeJugadores);

    divVentanaContenido.appendChild(document.createElement('br'));

    labelJugadores = document.createElement('label');
    labelJugadores.innerHTML = "Dificultad";
    divVentanaContenido.appendChild(labelJugadores);

    empezar = document.createElement('input');
    empezar.type = "range";
    empezar.min = "1";
    empezar.max = "100";
    divVentanaContenido.appendChild(empezar);

    divVentanaContenido.appendChild(document.createElement('br'));

    iniciar = document.createElement('button');
    iniciar.innerHTML = "INICIAR PARTIDA";
    iniciar.addEventListener("click", jugar);
    divVentanaContenido.appendChild(iniciar);

}

function jugar () {
    divVentana.remove();
    enPausa = false;
    ball_movement = setInterval(move_ball, 10);

}