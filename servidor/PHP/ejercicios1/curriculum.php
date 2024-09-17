<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículum</title>
</head>
<body>
    <?php 
        $idioma = "es"; //es va
        $estudios_es = "Estudios";
        $estudios_va = "Estudis";
        $estudios1_es = "Sistemas Microinformaticos y Redes";
        $estudios1_va = "Sistemes Microinformatics i Xarxes";
        $idiomas_es = "Idiomas";
        $idiomas_va = "Idiomes";
        $idiomas1_es = "<p>Castellano</p><p>Valenciano</p>";
        $idiomas1_va = "<p>Castellà</p><p>Valencià</p>";

        $estudios = "estudios_" . $idioma;
        $estudios1 = "estudios1_" . $idioma;
        $idiomas = "idiomas_" . $idioma;
        $idiomas1 = "idiomas1_" . $idioma;
    ?>
    <h1>Christian Gómez Mahiques</h1>
    <h2><?php echo $$estudios ?></h2>
    <p><?php echo $$estudios1 ?></p>
    <h2><?php echo $$idiomas ?></h2>
    <?php echo $$idiomas1 ?>
</body>
</html>