<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC - Listado de Tareas</title>
</head>
<body>
    
<?php
    session_start();
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: Views/Usuarios/login.php");
        exit();
    }
    $usuario_id = $_SESSION['usuario_id'];


    require_once "Controllers/tareasControlador.php";

    $controlador = new TareasControlador();

        if(isset($_GET['action'])){
            $action = $_GET['action'];
        }
        else{
            $action = "index";
        }

        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        else{
            $id = null;
        }
    

        if(method_exists($controlador, $action)){
            if($id){
                $controlador->$action($id);
            }
            else {
                $controlador->$action();
            }
        }

?>

</body>
</html>