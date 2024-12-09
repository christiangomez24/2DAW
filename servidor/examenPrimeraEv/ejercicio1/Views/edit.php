<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar notas</title>
</head>
<body>
    <h1>Editar notas</h1>
    <form method="POST" action="index.php?action=edit&id=<?= $tarea['id'] ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= $tarea['nombre'] ?>" required>
        <br>
        <label for="apellido1">Primer apellido:</label>
        <input type="text" name="apellido1" value="<?= $tarea['apellido1'] ?>" required>
        <br>
        <label for="apellido2">Segundo apellido:</label>
        <input type="text" name="apellido2" value="<?= $tarea['apellido2'] ?>" required>
        <br>
        <label for="profesor1">Profesor 1:</label>
        <input type="text" name="profesor1" value="<?= $tarea['profesor1'] ?>" required>
        <br>
        <label for="profesor2">Profesor 2:</label>
        <input type="text" name="profesor2" value="<?= $tarea['profesor2'] ?>" required>
        <br>
        <label for="profesor3">Profesor 3:</label>
        <input type="text" name="profesor3" value="<?= $tarea['profesor3'] ?>" required>
        <br>
        <label for="tutor">Tutor:</label>
        <input type="text" name="tutor" value="<?= $tarea['tutor'] ?>" required>
        <br>
        <button type="submit">Actualizar</button>

    </form>
</body>
</html>