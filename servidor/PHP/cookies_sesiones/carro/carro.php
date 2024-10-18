<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h3>Lista de artículos</h3>

    <?php 
    
    $articulos = array(
        array("id" => 1, "nombre" => "Zapatillas Nike", "precio" => 60),
        array("id" => 2, "nombre" => "Sudadera Domyos", "precio" => 15),
        array("id" => 3, "nombre" => "Pala de pádel Vairo", "precio" => 50),
        array("id" => 4, "nombre" => "Pelota de baloncesto Molten", "precio"
        => 20)
        );

        foreach ($articulos as $articulo){
            echo "<a href=''>".$articulo['nombre']." (".$articulo["precio"] . " euros)</a><br>";
        }
    ?>

    <h3>Carro de compra:</h3>
        <p>Total XXX Euros</p>
        <a href="">Vaciar Carro</a>

</body>
</html>