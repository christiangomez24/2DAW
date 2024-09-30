<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprueba hora</title>
</head>
<body>

<?php

    //Pendiente separar la logica de la vista creando un 
    //formulario en comprueba_hora_view.php

    $horaIntroducida = "21:30:12";
    $hora = substr($horaIntroducida,0,2);
    $min = substr($horaIntroducida,3,2);
    $sec = substr($horaIntroducida,6,2);

    if ($hora>23) echo "Apartado hora incorrecto";
    if ($min>59) echo "Apartado minutos incorrecto";
    if ($sec>59)  echo "Apartado segundos incorrecto";

?>
    
</body>
</html>