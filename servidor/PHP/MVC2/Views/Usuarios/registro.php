<?php
include 'Config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre_usuario, email, contrasena) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre_usuario, $email, $contrasena);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error al registrar usuario.";
    }
}
?>

<form method="post" action="../../Controllers/usuarioControlador.php">
    <input type="hidden" name="accion" value="registro">
    <input type="text" name="nombre_usuario" placeholder="Nombre de Usuario" required>
    <input type="email" name="email" placeholder="Correo Electrónico" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <input type="submit" value="Registrarse">
</form>

