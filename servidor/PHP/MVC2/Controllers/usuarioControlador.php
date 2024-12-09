<?php
include '../Config/conexion.php';  // Incluir la conexión a la base de datos
session_start();  // Iniciar la sesión para gestionar autenticación

// Verificar si la solicitud es de tipo POST, ya sea para registro o login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion']) && $_POST['accion'] === 'registro') {
        // Registro de Usuario
        $nombre_usuario = $_POST['nombre_usuario'];
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];

        // Hash de la contraseña antes de almacenarla en la base de datos
        $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

        // Consulta para insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO usuarios (nombre_usuario, email, contrasena) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nombre_usuario, $email, $hashed_password);

        if ($stmt->execute()) {
            // Redirigir al usuario al login después del registro exitoso
            header("Location: ../Views/Usuarios/login.php");
            exit();
        } else {
            echo "Error: No se pudo registrar el usuario. Por favor, intente nuevamente.";
        }
    } elseif (isset($_POST['accion']) && $_POST['accion'] === 'login') {
        // Login de Usuario
        $nombre_usuario = $_POST['nombre_usuario'];
        $contrasena = $_POST['contrasena'];

        // Consulta para obtener la información del usuario
        $sql = "SELECT id, contrasena FROM usuarios WHERE nombre_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nombre_usuario);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $hashed_password);

        if ($stmt->num_rows > 0) {
            $stmt->fetch();
            // Verificar la contraseña
            if (password_verify($contrasena, $hashed_password)) {
                $_SESSION['usuario_id'] = $id;  // Guardar el ID del usuario en la sesión
                header("Location: ../../index.php");  // Redirigir al usuario a la página principal
                exit();
            } else {
                echo "Error: Contraseña incorrecta.";
            }
        } else {
            echo "Error: Usuario no encontrado.";
        }
    }
}
?>
