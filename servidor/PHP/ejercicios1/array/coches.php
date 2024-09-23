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
        "2847BCD" => ["Fiat", "Bravo", "3 puertas"],
        "0000HCF" => ["Seat", "Ibiza", "3 puertas"]
    );


    echo "A continuación se listan los vehiculos: <br>";
    asort($garage); //Ordenamos el array por matricula



        //vehiculo es el primer array y detalles el segundo. asi se recorre un asociativo con un foreach
    foreach ($garage as $vehiculo=>$detalles){
        echo $vehiculo ." ";
    //     for ($i=0;$i<3;$i++) {
    //         echo $detalles[$i] . " ";
    //     }
    //     echo "<br>";
    foreach ($detalles as $det){
         echo $det . " ";
    }
    echo "<br>";

}


?>
</body>
</html>