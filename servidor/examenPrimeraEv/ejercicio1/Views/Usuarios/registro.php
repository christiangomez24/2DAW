<?php
include '../../Models/modeloUsuarios.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nombre_usuario, $contrasena);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error al registrar usuario.";
    }
}
?>
<h1>Registrarse</h1>

<form method="post" >
    <input type="hidden" name="accion" value="registro">
    <input type="text" name="nombre_usuario" placeholder="Nombre de Usuario" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <input type="submit" value="Registrarse">
</form>

