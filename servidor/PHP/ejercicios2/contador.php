<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador.php</title>
</head>
<body>
    <?php 
        function cuenta($a, $b){
            // for ($i=$a;$i<$b;$i++){
            //     echo $a .",";
            // }
            do {
                echo $a . ",";
                $a++;
            } while ($a<=$b);
        }
        cuenta(10,20);
    ?>
</body>
</html>