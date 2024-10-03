<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $subido=false;
        if (isset($_POST['btnSubir']) && $_POST['btnSubir'] == 'Subir') {
            if (is_uploaded_file($_FILES['archivoEnviado']['tmp_name'])) {
                // subido con éxito
                $nombre = $_FILES['archivoEnviado']['name'];
                $tipo = $_FILES["archivoEnviado"]["type"];
                if ($tipo == "image/jpeg" ||$tipo == "image/png"){
                    move_uploaded_file($_FILES['archivoEnviado']['tmp_name'], "uploads/{$nombre}");
                    echo "<p>Archivo $nombre subido con éxito</p>";
                    $subido=true;
                    echo '<img src="uploads/'.$nombre.'"/>';
                } else echo "no es una imagen";
            }
        }
    ?>



    <form enctype="multipart/form-data" action="subidaimagen.php" method="POST">
        Archivo: <input name="archivoEnviado" type="file" />
        <br />
        <input type="submit" name="btnSubir" value="Subir" />
    </form>
</body>
    <?php
        if ($subido){
            sleep(15);
            header("Location: subidaimagen.php");
        }
    ?>
</html>