//Instanciacion de funciones

let detalle = (detalleID)=>{
 // alert(detalleID.name);

  // Creación div myModal
  myModal = document.createElement('div');
  myModal.id = "myModal";
  myModal.classList.add("modal");
  document.body.appendChild(myModal);

  // Creación span close cursor
  closeCursor = document.createElement('span');
  closeCursor.classList.add("close");
  closeCursor.classList.add("cursor");
  closeCursor.innerHTML = "&times;";
  closeCursor.addEventListener("click", cerrarDetalle);
  myModal.appendChild(closeCursor);

   // Creación div modal-content
   modalContent = document.createElement('div');
   modalContent.classList.add("modal-content");
   myModal.appendChild(modalContent);

  //creo imagen
  imagen = document.createElement('img');
  imagen.classList.add("card-img-top");
  imagen.src = detalleID["img"];
  modalContent.appendChild(imagen)

  //creo subcontenedor para el contenido
  cuerpoTarjeta = document.createElement('div');
  cuerpoTarjeta.classList.add("card-body");
  modalContent.appendChild(cuerpoTarjeta);
  
  //creo título
  titulo = document.createElement('h5');
  titulo.classList.add("card-title");
  titulo.appendChild(document.createTextNode(detalleID["name"]));
  cuerpoTarjeta.appendChild(titulo);

  //creo comensales
  comensales = document.createElement('h6');
  comensales.classList.add("card-subtitle");
  comensales.classList.add("mb-2");
  comensales.classList.add("ext-body-secondary");
      //controlo que no hayan 0 comensales
      if (detalleID["servings"]>0){
          comensales.appendChild(document.createTextNode("Número de raciones: "+detalleID["servings"]));
      }
  cuerpoTarjeta.appendChild(comensales);
  
  //creo descripcion
  descripcion = document.createElement('p');
  descripcion.classList.add("card-text");
  descripcion.appendChild(document.createTextNode(detalleID["description"]));
  cuerpoTarjeta.appendChild(descripcion);



}

let cerrarDetalle = ()=> myModal.remove();





//Creación del DOM


div = document.createElement('div');
div.id = "contenido";
document.body.appendChild(div);

//creo titulo de la web
wTitulo = document.createElement('h1');
wTitulo.appendChild(document.createTextNode("Web de recetas de cocina"));
div.appendChild(wTitulo);

// creando las recetas y mostrandolas
for (let i=0;i<recetasJSON.length;i++){

    //Creo div contenedor
    tarjeta = document.createElement('div');
    tarjeta.classList.add("card");
    tarjeta.classList.add("hover-shadow");
    tarjeta.id = "tarjeta"+i;


    // event.currentTarget es el elemento al cual el evento fue asignado, 
    //  mientras que event.target es el elemento donde realmente ocurrió el clic.
    // event.currentTarget.id te devuelve el id del elemento que tiene registrado el evento.
    // Usar event.currentTarget es especialmente útil cuando se trabaja con contenedores
    // que tienen varios subelementos y quieres asegurarte de que estás interactuando con el
    // contenedor, no con el subelemento que disparó el evento.
    // tarjeta.addEventListener("click", (event)=>{detalle(event.currentTarget.id)}); //prob


    //para evitar que me devuelva el objeto de la última ejecución (por referencia) se clona el objeto en el momento exacto de la ejecución
    // guardandose en una variable evitando así mostrar siempre el último.
    let clone = Object.assign({}, recetasJSON[i]);
    tarjeta.addEventListener("click",function() {detalle(clone)});

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











// ++++++++++++++++++++++++++++++++++ LIGHTBOX ++++++++++++++++++++++++++++
// Open the Modal
// function openModal() {
//     document.getElementById("myModal").style.display = "block";
//   }
  
  // Close the Modal
  // function closeModal() {
  //   document.getElementById("myModal").style.display = "none";
  // }
  
  // var slideIndex = 1;
  // showSlides(slideIndex);
  
  // Next/previous controls
  // function plusSlides(n) {
  //   showSlides(slideIndex += n);
  // }
  
  // Thumbnail image controls
  // function currentSlide(n) {
  //   showSlides(slideIndex = n);
  // }
  
  // function showSlides(n) {
  //   var i;
  //   var slides = document.getElementsByClassName("mySlides");
  //   var dots = document.getElementsByClassName("demo");
  //   var captionText = document.getElementById("caption");
  //   if (n > slides.length) {slideIndex = 1}
  //   if (n < 1) {slideIndex = slides.length}
  //   for (i = 0; i < slides.length; i++) {
  //     slides[i].style.display = "none";
  //   }
  //   for (i = 0; i < dots.length; i++) {
  //     dots[i].className = dots[i].className.replace(" active", "");
  //   }
  //   slides[slideIndex-1].style.display = "block";
  //   dots[slideIndex-1].className += " active";
  //   captionText.innerHTML = dots[slideIndex-1].alt;
  // }