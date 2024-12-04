<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC - Listado de Tareas</title>
</head>
<body>
    
<?php

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