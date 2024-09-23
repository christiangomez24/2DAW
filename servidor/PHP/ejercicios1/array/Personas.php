<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas.php</title>
</head>
<body>
    <?php 
        $personas = [
             ["nombre"=>"Aitor","altura"=>182,"email"=>"aitor@gmail.com"],
             ["nombre"=>"Christian","altura"=>184,"email"=>"christian@mail.com"],
             ["nombre"=>"David","altura"=>172,"email"=>"david@mail.com"],
             ["nombre"=>"Sergio","altura"=>177,"email"=>"sergio@gmail.com"],
             ["nombre"=>"Juan","altura"=>180,"email"=>"juan@mail.com"]
            ];

        foreach($personas as $persona){
            echo $persona["nombre"] . ", " . $persona["altura"] . ", " . $persona["email"] . "<br>";
        }
    ?>
</body>
</html>