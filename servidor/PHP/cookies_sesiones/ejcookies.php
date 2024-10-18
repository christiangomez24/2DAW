<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        if (isset($_REQUEST['usuario'])){
            setcookie("user", $_REQUEST['usuario'], time()+1000);
        } 

        if(isset($_COOKIE['user'])){
            echo $_COOKIE['user'];
        } else {
            ?>
            <form action="" method="post">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario"></input>
                <input type="submit"></input>
            </form>
            <?php
        }

    ?>
</body>
</html>