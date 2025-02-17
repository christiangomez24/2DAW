<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Verificar que todos los campos existan
        if (!isset($_POST['nombre']) || !isset($_POST['apellidos']) || !isset($_FILES['avatar'])) {
            echo json_encode(["status" => "ko", "error" => "Faltan campos obligatorios"]);
            exit;
        }

        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];

        // Validar el archivo subido
        $avatar = $_FILES['avatar'];

        if ($avatar['error'] !== UPLOAD_ERR_OK) {
            echo json_encode(["status" => "ko", "error" => "Error al subir el archivo"]);
            exit;
        }

        $allowedTypes = ['image/jpeg', 'image/png'];
        if (!in_array($avatar['type'], $allowedTypes)) {
            echo json_encode(["status" => "ko", "error" => "Formato de archivo no permitido"]);
            exit;
        }

        // Guardar el archivo
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filePath = $uploadDir . basename($avatar['name']);
        if (!move_uploaded_file($avatar['tmp_name'], $filePath)) {
            echo json_encode(["status" => "ko", "error" => "Error al guardar el archivo"]);
            exit;
        }

        // Guardar los datos en la base de datos o realizar cualquier otra acción necesaria
        // Por simplicidad, solo estamos guardando el archivo

        echo json_encode(["status" => "ok"]);
    } catch (Exception $e) {
        echo json_encode(["status" => "ko", "error" => "Error desconocido: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "ko", "error" => "Método no permitido"]);
}
