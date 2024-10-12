<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ley d'Hont</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center">Ley d'Hont</h1><br>


    <?php if(!isset($_REQUEST['numPartidosPoliticos']) && !isset($_REQUEST['cantVotPart0'])) { ?>
    <form action="" method="post">
        <div class="mb-3">
            <label for="numPartidosPoliticos" class="form-label">Número de Partidos Políticos</label>
            <input type="number" class="form-control" id="numPartidosPoliticos" name="numPartidosPoliticos">
        </div>

        <div class="mb-3">
            <label for="numEscRep" class="form-label">Número de escaños a repartir</label>
            <input type="number" class="form-control" id="numEscRep" name="numEscRep">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php } ?>

    <?php
        if(isset($_REQUEST['numPartidosPoliticos']) && isset($_REQUEST['numEscRep'])) {
            $nPP = $_REQUEST["numPartidosPoliticos"];
            $nEsc = $_REQUEST['numEscRep'];
            for ($i=0;$i<$nPP;$i++){
                echo "<h3>Partido Político ".($i+1)."</h3><br>"; ?>  
                <form action="" method="post">  
                    <div class="mb-3">
                        <label for="<?php echo 'cantVotPart'.$i; ?>" class="form-label">Cantidad de votos</label>
                        <input type="number" class="form-control" id="<?php echo 'cantVotPart'.$i; ?>" name="<?php echo 'cantVotPart'.$i; ?>">
                    </div> <?php
            }       ?>
                    <!-- Es necesario volver a pasar el valor para recogerlo por variable para el siguiente form -->
                    <input hidden type="number" class="form-control" id="nPP" name="nPP" value= <?php echo $nPP; ?> >
                    <input hidden type="number" class="form-control" id="nEsc" name="nEsc" value= <?php echo $nEsc; ?> >

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form> <?php 
        }


        if(isset($_REQUEST['cantVotPart0'])) {
            $nPP = $_REQUEST["nPP"];
            $nEsc = $_REQUEST["nEsc"];

            // Recoger cantidad de votos por partido:
            for ($f=0;$f<$nPP;$f++){
                $arrayVotosPartidos[] = $_REQUEST["cantVotPart".$f];
            }
            
            ?>
            
    <!-- tabla mostrar resultados -->
    <div class="container text-center">
        <div class="row">
            <div class="col">
               <!-- casilla vacia  -->
            </div>
            
            <?php
            for ($i=0;$i<$nPP;$i++){ ?>
            <div class="col">
                <b>Partido <?php echo $i+1; ?> </b>
            </div>
      <?php } ?>
        </div>
        <div class="row">
            <div class="col">
                <b>Votos</b>
            </div> 
            <?php 
            foreach ($arrayVotosPartidos as $votos){ ?>
                <div class="col">
                    <?php echo $votos; ?>
                </div> <?php
            }
            
            
            ?>
        </div>
         <?php

            for ($i=1;$i<=$nEsc;$i++){ ?>
                <div class="row">
                    <div class="col">
                        <b>Escaño <?php echo $i ?> </b>
                    </div> <?php
            for ($a=0;$a<$nPP;$a++){ ?>
                <div class="col">
                    <?php echo floor($arrayVotosPartidos[$a]/$i); //floor retorna sin decimales ?> 
                </div>
      <?php } ?>
                </div>
    <?php } } ?>
        
        
    </div>



</body>
</html>