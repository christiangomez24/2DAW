<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nota1 = 6.5;
        $nota2 = 7;
        $nota3 = 4.9;

        if ($nota1>$nota2){ 
            //echo "La primera nota es mayor que la segunda";
            if ($nota1>$nota3){ 
                echo "La primera nota es la mayor de las 3";
            } else {
                echo "La tercera nota es la mayor de las 3";
            }
        } elseif($nota2>$nota3)  {
            echo "La segunda nota es la mayor de las 3";
        } else {
            echo "La tercera nota es la mayor de las tres";
        }
    ?>
</body>
</html>