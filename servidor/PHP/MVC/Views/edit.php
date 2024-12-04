<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar Tarea</h1>
    <form method="POST" action="index.php?action=edit&id=<?= $tarea['id'] ?>">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="<?= $tarea['title'] ?>" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" value="<?= $tarea['description'] ?>" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>