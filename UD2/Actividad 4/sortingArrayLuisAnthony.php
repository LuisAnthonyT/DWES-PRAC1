<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenando Arrays</title>
</head>
<body>
    <hr>
    <h2>Números aleatorios</h2>
    <ul>
    <?php 
        $arrayEnteros = [];
        
        //Array con números random
        for($a=0; $a<9; $a++){
            $numRandom = rand(0,100);
            $arrayEnteros[$a] = $numRandom;   
            echo "<li>$arrayEnteros[$a]</li>"; 
        }
        echo "</ul>";
        
        //Ordenamiento con el método de selección
        for ($i = 0; $i < count($arrayEnteros); $i++) {
            $posMenor = $i;
            for ($j = $i + 1; $j < count($arrayEnteros); $j++) {
                if ($arrayEnteros[$j] < $arrayEnteros[$posMenor]) {
                    $posMenor = $j;
                }
            }
            if ($posMenor > $i) {
                $temp = $arrayEnteros[$i];
                $arrayEnteros[$i] = $arrayEnteros[$posMenor];
                $arrayEnteros[$posMenor] = $temp;
            }
        }

        //Imprime el array ordenado
        echo "<hr>";
        echo "<h2>Números ordenados con el método de selección</h2>";
        echo "<ul>";
        for($a=0;$a<count($arrayEnteros);$a++){
            echo "<li>$arrayEnteros[$a]</li>"; 
        }
        echo "</ul>";

        $arrayEnterosBurbuja = [];
        
        //Array 2 con números random
        echo "<hr>";
        echo "<h2>Números aleatorios 2</h2>";
        echo "<ul>";
        for($a=0; $a<9; $a++){
            $numRandom = rand(0,100);
            $arrayEnterosBurbuja[$a] = $numRandom;   
            echo "<li>$arrayEnterosBurbuja[$a]</li>"; 
        }
        echo "</ul>";

        //Ordenamiento con el método de la burbuja
            $longitud = count($arrayEnterosBurbuja);
            for ($a = 0; $a < $longitud; $a++) {
                for ($b = 0; $b < $longitud - 1; $b++) {

                    if ($arrayEnterosBurbuja[$b] > $arrayEnterosBurbuja[$b + 1]) {
                        $temp = $arrayEnterosBurbuja[$b];
                        $arrayEnterosBurbuja[$b] = $arrayEnterosBurbuja[$b + 1];
                        $arrayEnterosBurbuja[$b + 1] = $temp;
                    }
                 }
            }
        //Imprime el array ordenado 2
        echo "<hr>";
        echo "<h2>Números ordenados con el método de la burbuja</h2>";
        echo "<ul>";
        for($a=0;$a<count($arrayEnterosBurbuja);$a++){
            echo "<li>$arrayEnterosBurbuja[$a]</li>"; 
        }
        echo "</ul>";
        ?>
              
</body>
</html>