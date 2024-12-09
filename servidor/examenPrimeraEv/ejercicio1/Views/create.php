<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Agregar Tarea</h1>
    <form method="POST" action="index.php?action=create">
    <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="apellido1">Primer apellido:</label>
        <input type="text" name="apellido1" required>
        <br>
        <label for="apellido2">Segundo apellido:</label>
        <input type="text" name="apellido2" required>
        <br>
        <label for="profesor1">Profesor 1:</label>
        <input type="text" name="profesor1" required>
        <br>
        <label for="profesor2">Profesor 2:</label>
        <input type="text" name="profesor2" required>
        <br>
        <label for="profesor3">Profesor 3:</label>
        <input type="text" name="profesor3" required>
        <br>
        <label for="tutor">Tutor:</label>
        <input type="text" name="tutor" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>