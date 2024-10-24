
const paddle = document.getElementById("paddle");
const ball = document.getElementById("ball");

const ball_radius = 0;

var velocity_x = 5;
var velocity_y = 5;

//Add onkeypress handler
document.onkeydown = pulsacion;

// Move ball
var ball_movement = setInterval(move_ball, 10);

function move_ball(){
    

    //console.log(ball.offsetTop);
    //console.log(window.innerHeight);


    //Check Top
    if (ball.offsetTop - ball_radius <= 0) {
        velocity_y = -velocity_y;
    }

    //Check right
    if (ball.offsetLeft + ball_radius >= window.innerWidth) {
        velocity_x = -velocity_x;
    }

    //Check bottom
    if (ball.offsetTop+ ball_radius  >= window.innerHeight) {
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

let enPausa = false;

function pulsacion(pkey){
     console.log("tecla pulsada: " + pkey.which);  

    if (pkey.which == 87){ // tecla w
        paddle.style.top = (paddle.offsetTop - 10) +"px"; //subir pala
    } else if (pkey.which == 83){ // tecla s
        paddle.style.top = (paddle.offsetTop + 10) +"px"; //bajar pala
    } else if (pkey.which == 32){
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
    }
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
    tituloPausa.setAttribute("style","color:red");
    divVentanaContenido.appendChild(tituloPausa);

    descripcionPausa = document.createElement('p');
    descripcionPausa.innerHTML = "Estás en el menú de pausa. Para continuar vuelve a presionar la tecla espacio.";
    divVentanaContenido.appendChild(descripcionPausa);
}