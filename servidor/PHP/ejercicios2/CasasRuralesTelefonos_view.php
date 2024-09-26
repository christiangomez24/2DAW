<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "CasasRuralesTelefonos.php";

        //listar únicamente id, localidad, nombre y telefono.
        echo "id localidad nombre telefono<br>";

        foreach ($casas as $casa){
            echo $casa["id"] . " ". $casa["localidad"] ." ".  $casa["nombre"]." ". $casa["telefono"] . "<br>";
        }  

        echo "Casas descartadas: " . count($casasDescartadas);
        //print_r($casasDescartadas);
    ?>
</body>
</html>