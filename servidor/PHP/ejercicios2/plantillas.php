<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>plantillas.php</title>
</head>
<body>
    <?php

        $fp = fopen("plantillas.csv", "r");
        while (!feof($fp)){
            $file[] = fgets($fp);
        }
        //meto todo en un array
        foreach ($file as $values){
            $contenido[] = explode(",", $values);
        }
        //print_r ($contenido);
        //echo "<br>";
        //recorro array sacando la tabla solicitada
        foreach ($contenido as $campo){
            echo "$campo[11] $campo[4] $campo[5] $campo[10] $campo[1] <br>";
        }
        echo "<br>";


        //listar únicamente At Madrid.
        foreach ($contenido as $equipo){
            if ($equipo[1] == "Atlético de Madrid"){
                $atMad[] = $equipo;
            }
        }
        //filtro por dorsales
        foreach ($atMad as $dorsal){
            $atMadDor[] = $dorsal[11];
        }     
        //Ordeno dorsales
        sort($atMadDor);
        //print_r($atMadDor);
        //Listo los jugadores ordenando por dorsal comparando array dorsales
        
        
        for ($i=0;$i<count($atMad);$i++){
            foreach ($atMad as $jug){
                if($atMadDor[$i] == $jug[11]){ //$jug[11] = 15
                    echo "$jug[11] $jug[4] $jug[5] $jug[10] $jug[1] <br>";
                }
            }
        }

        fclose($fp);

    ?>
</body>
</html>