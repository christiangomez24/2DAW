<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>parametrosVariables.php</title>
</head>
<body>
    <?php
        function mayor() {
            $arrayArgs = func_get_args();
            //$cantidad = func_num_args();
            rsort($arrayArgs);

            return $arrayArgs[0];
        }

        echo mayor(20,15,46); // 46
    ?>
</body>
</html>