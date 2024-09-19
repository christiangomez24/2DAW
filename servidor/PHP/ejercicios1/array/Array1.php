<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array1.php</title>
</head>
<body>
    <?php 
        echo "<p>Rellena array 50 num random 0 a 99 y desordena.</p>";
        $numeros = [];
        // for ($i=0;$i<50;$i++){
        //     $numeros[] = rand(0,99);
        // }

        //comprobar que el numero no exista
        $repe = in_array(5,$numeros);
        for ($i=0;$i<50;$i++){
            $rand = rand(0,99);
            //de esta manera una vez repetidos no vuelve a randomizar
            // if (in_array($rand,$numeros)){
            //     $rand = rand(0,99);
            // } else{
            //     $numeros[] = $rand;
            // }

            //mientras este repetido randomiza
            //despues mete el numero unico en el array
            while (in_array($rand,$numeros)){
                $rand = rand(0,99);
            }
            $numeros[] = $rand;
        }
        //Muestra la lista por pantalla.
        for ($i=0;$i<50;$i++){
            if ($i<49){
                echo $numeros[$i] . ", ";
            } else {
                echo $numeros[$i] . ".";
            }
        }
    ?>

    <h4>Mejoras:</h4>

    <?php

        echo "<p>Ordenando salida.</p>";
        sort($numeros);
        for ($a=0;$a<50;$a++){
            if ($a<49){
                echo $numeros[$a] . ", ";
            } else {
                echo $numeros[$a] . ".";
            }
        }  
        //buscando el mayor
        rsort($numeros);
        $mayor = $numeros[0];

        //el menor
        sort($numeros);
        $menor = $numeros[0];

        //la media
        foreach ($numeros as $numero){
            $sumatorio += $numero;
        }
        $media = $sumatorio / count($numeros);

    ?>
    <p>El mayor es: <?php echo $mayor; ?></p>
    <p>El menor es: <?php echo $menor; ?></p>
    <p>La media es: <?php echo $media; ?></p>


</body>
</html>