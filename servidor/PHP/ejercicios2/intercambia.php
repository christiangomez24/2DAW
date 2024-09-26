<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>intercambia.php</title>
</head>
<body>
    <?php
        function intercambia(&$a, &$b) {
            $temp = $a;  // Almacena el valor de $a temporalmente
            $a = $b;     // Asigna a $a el valor de $b
            $b = $temp;  // Asigna a $b el valor que tenía $a
        }

        $numero1 = 5;
        $numero2 = 10;

        echo "Antes del intercambio: \$numero1 = $numero1, \$numero2 = $numero2 <br>";
        intercambia($numero1, $numero2);

        echo "Después del intercambio: \$numero1 = $numero1, \$numero2 = $numero2 <br>";
    ?>
</body>
</html>