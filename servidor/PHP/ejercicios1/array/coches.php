<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $garage = array(
        "4037GJD" => ["Toyota", "Celica", "3 puertas"],
        "0005DBX" => ["Honda", "CBR125", "0 puertas"],
        "V2345FZ" => ["Fiat", "Bravo", "3 puertas"],
        "V3478TY" => ["Seat", "Ibiza", "3 puertas"]
    );


    echo "A continuación se listan los vehiculos: <br>";
        //vehiculo es el primer array y detalles el segundo. asi se recorre un asociativo con un foreach
    foreach ($garage as $vehiculo=>$detalles){
        echo $vehiculo ." ";
        for ($i=0;$i<3;$i++) {
            echo $detalles[$i] . " ";
        }
        echo "<br>";
    }


?>
</body>
</html>