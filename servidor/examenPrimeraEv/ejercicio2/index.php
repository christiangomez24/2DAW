<!-- CHRISTIAN GOMEZ MAHIQUES -->


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>title</title>
</head>
<body>


<?php


    // Detecta la acción solicitada en la URL
    $idioma = isset($_GET['idioma']) ? $_GET['idioma'] : 'index';
    // Llama al método correspondiente en el controlador
    switch ($idioma) {
        case 'ES':
            $estudios = "Soy un modelo de lenguaje desarrollado por OpenAI. Tengo una gran cantidad de
            conocimientos y puedo ayudarte en una variedad de tareas.";
            $idiomas = "Hablo varios idiomas, incluyendo el español y el inglés.";
            break;
        case 'VAL':
            $estudios = "Sóc un model de llenguatge desenvolupat per OpenAI. Tinc una gran quantitat de
            coneixements i puc ajudar-te en una varietat de tasques.";
            $idiomas = "Parle diversos idiomes, incloent-hi l’espanyol i l’anglés.";
            break;
        case 'EN':
            $estudios = "I am a language model developed by OpenAI. I have a vast amount of knowledge and can
            assist you in a variety of tasks.";
            $idiomas = "I speak multiple languages, including Spanish and English.";
            break;
        default:
        $estudios = "Soy un modelo de lenguaje desarrollado por OpenAI. Tengo una gran cantidad de
        conocimientos y puedo ayudarte en una variedad de tareas.";
        $idiomas = "Hablo varios idiomas, incluyendo el español y el inglés.";
        break;
    }
?>

<p>Idioma: <a href="index.php?idioma=ES">Español</a> <a href="index.php?idioma=VAL">Valenciano</a> <a href="index.php?idioma=EN">Inglés</a></p>






    <?php

    echo $estudios;
    echo "<br>";
    echo $idiomas;


?>


    
</body>
</html>