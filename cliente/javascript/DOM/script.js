div = document.createElement('div');
div.id = "contenido";
document.body.appendChild(div);

//creo titulo de la web
wTitulo = document.createElement('h1');
wTitulo.appendChild(document.createTextNode("Web de recetas de cocina"));
div.appendChild(wTitulo);

// creando las recetas y mostrandolas
for (i=0;i<6;i++){

    //Creo div contenedor
    tarjeta = document.createElement('div');
    tarjeta.classList.add("card");
    tarjeta.id = "tarjeta"+i;
    div.appendChild(tarjeta);

    //creo imagen
    imagen = document.createElement('img');
    imagen.classList.add("card-img-top");
    imagen.src = recetasJSON[i]["img"];
    tarjeta.appendChild(imagen)

    //creo subcontenedor para el contenido
    cuerpoTarjeta = document.createElement('div');
    cuerpoTarjeta.classList.add("card-body");
    tarjeta.appendChild(cuerpoTarjeta);
    
    //creo título
    titulo = document.createElement('h5');
    titulo.classList.add("card-title");
    titulo.appendChild(document.createTextNode(recetasJSON[i]["name"]));
    cuerpoTarjeta.appendChild(titulo);

    //creo comensales
    comensales = document.createElement('h6');
    comensales.classList.add("card-subtitle");
    comensales.classList.add("mb-2");
    comensales.classList.add("ext-body-secondary");
        //controlo que no hayan 0 comensales
        if (recetasJSON[i]["servings"]>0){
            comensales.appendChild(document.createTextNode("Número de raciones: "+recetasJSON[i]["servings"]));
        }
    cuerpoTarjeta.appendChild(comensales);
    
    //creo descripcion
    descripcion = document.createElement('p');
    descripcion.classList.add("card-text");
    descripcion.appendChild(document.createTextNode(recetasJSON[i]["description"].substring(0,50)+"..."));
    cuerpoTarjeta.appendChild(descripcion);

}
