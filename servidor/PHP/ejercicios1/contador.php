<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador</title>
</head>
<body>
    <?php 
        //Listar del 1 al 100
        for ($i=1;$i<101;$i++){
            if ($i<100) {
                echo $i .",";
            } else {
                echo $i . ".";
            }
        }
    ?>
    <br>
    <?php
       //cuenta atrás de 10 - 0  
       $x = 10;
       while ($x>-1){
            if($x>0){
                echo $x . "-";
            } else {
                echo $x;
            }
        $x--;
       }
    ?>
</body>
</html>