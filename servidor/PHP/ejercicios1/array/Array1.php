<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array1.php</title>
</head>
<body>
    <?php 
        //Rellena array 50 num random 0 a 99 y desordena.
        $numeros = [];
        for ($i=0;$i<51;$i++){
            $numeros[$i] = rand(0,99);
        }
        foreach ($numeros as $numero){
            echo $numeros[$numero];
        }
    ?>
</body>
</html>