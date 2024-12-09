<?php
include '../../Config/conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT id, contrasena FROM usuarios WHERE nombre_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nombre_usuario);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($contrasena, $hashed_password)) {
            $_SESSION['usuario_id'] = $id;
            header("Location: index.php");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>

<form method="post" action="../../Controllers/usuarioControlador.php">
    <input type="hidden" name="accion" value="login">
    <input type="text" name="nombre_usuario" placeholder="Nombre de Usuario" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <input type="submit" value="Iniciar Sesión">
</form>

