<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArrayAsociativo.php</title>
</head>
<body>
    <?php 
        $MF = []; //Array que será rellenado aleatoriamente
        $MF1 = ["M","F"]; //Array que después se utilizará para rellenar $MF de forma random
        $resultado = array("M"=>0,"F"=>0);
        
        for ($i=0;$i<100;$i++){
            $MF[]=$MF1[rand(0,1)];
        }

        foreach ($MF as $male_female){
            //echo $male_female . ",";
            if ($male_female=="M"){
                $resultado["M"]+=1;
            } else {
                $resultado["F"]+=1;
            }
        }
        echo "<br>";
        echo "<h3>Resultados:</h3>";
        echo "Total M: " . $resultado['M'] . "<br>";
        echo "Total F: " . $resultado['F'];
    
    ?>
</body>
</html>