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
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>