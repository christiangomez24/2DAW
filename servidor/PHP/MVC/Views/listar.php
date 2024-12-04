<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Tareas</h1>
    <a href="index.php?action=create">Agregar Tarea</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Fecha creación</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach ($tareas as $tarea): ?>
            <tr>
                <td><?php echo $tarea['id'] ?></td>
                <td><?php echo $tarea['title'] ?></td>
                <td><?php echo $tarea['description'] ?></td>
                <td><?php echo $tarea['created_at'] ?></td>
                <td>
                    <a href="index.php?action=edit&id=<?= $tarea['id'] ?>">Editar</a>
                </td>
                <td>
                    <a href="index.php?action=delete&id=<?= $tarea['id'] ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>