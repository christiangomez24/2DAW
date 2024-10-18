<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recordar</title>
</head>
<body>

    <?php
        if (isset($_COOKIE['usuario'])){
            $usu = $_COOKIE['usuario'];
        } else {
            $usu = "";
        }
        if (isset($_COOKIE['pass'])){
            $clave = $_COOKIE['pass'];
        } else {
            $clave = "";
        }
    ?>


    <form action="" method="post">
        <input type="text" name="user" value= <?php echo $usu ?> >
        <input type="password" name="password" value= <?php echo $clave ?> >
        <input type="checkbox" name="recordar" id="recordar">
        <label for="recordar">Recordar</label><br>
        <button>Iniciar Sesión</button>
    </form>

    <?php
    
    if (isset($_REQUEST["user"]) && isset($_REQUEST["password"]) && isset($_REQUEST["recordar"])){
        if ($_REQUEST["recordar"] == "on") {
            setcookie('usuario', $_REQUEST["user"]);
            setcookie('pass', $_REQUEST["password"]);
        }
    }
    
    
    ?>


</body>
</html>