<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con AJAX</title>
    <script>
        async function enviarFormulario(event) {
            event.preventDefault();
            const form = document.getElementById('formulario');
            const formData = new FormData(form);

            try {
                const response = await fetch('guardar_datos.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.status === "ok") {
                    alert("Información guardada correctamente.");
                } else {
                    alert(`Error: ${result.error}`);
                }
            } catch (error) {
                alert("Error desconocido al enviar el formulario.");
                console.error(error);
            }
        }
    </script>
</head>
<body>
    <h1>Formulario</h1>
    <form id="formulario" onsubmit="enviarFormulario(event)">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>
        </div>
        <div>
            <label for="avatar">Avatar:</label>
            <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" required>
        </div>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
