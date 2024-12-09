<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    

<?php

// session_start();
// if (!isset($_SESSION['usuario_id'])) {
//     header("Location: Views/Usuarios/inicio.php");
//     exit();
// }
// $usuario_id = $_SESSION['usuario_id'];

require_once "Controllers/tareasControlador.php";

$controller = new tareasControlador();

// Detecta la acción solicitada en la URL
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Llama al método correspondiente en el controlador
switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    default:
        $controller->index();
        break;
}

?>

</body>
</html>