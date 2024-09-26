<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CasasRuralesTelefonos.php</title>
</head>
<body>
    <h2>Casas Rurales Teléfonos</h2>
    <?php
        $fp = fopen("casas_rurales.csv", "r");
        while (!feof($fp)){
            $file[] = fgets($fp);
        }
        //meto todo en un array
        foreach ($file as $values){
            $contenido[] = explode(";", $values);
        }

        $cabecera = array_shift($contenido);
        
        foreach($contenido as $fila){
            if(count($fila)==count($cabecera)) //control de errores: que todas las filas tengan las columnas que deben.
                $cont_asociado[] = array_combine($cabecera,$fila);
        }     

        foreach ($cont_asociado as $c){
            if (empty($c["telefono"])){
                $casasDescartadas[] = $c;
            } else {
                $casas[] = $c;
            }
        }

        fclose($fp);
    ?>
</body>
</html>