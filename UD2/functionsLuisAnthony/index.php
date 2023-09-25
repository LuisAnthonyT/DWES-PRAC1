<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 5</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <h1>Luis Anthony Toapanta Bolaños</h1>
    <?php 
        $numRandom1 = rand(1,10);
        $numRandom2 = rand(1,10);

        echo "<div class='container'> <h2>Números Random</h2>";
        echo "Números random:  $numRandom1  ,  $numRandom2";
        echo "</div>";
    

        // PARTE 1
        function bigNumber ($numRandom1, $numRandom2) {

            echo "<div class='container'> <h2>Número más grande</h2>";
            if ($numRandom1 > $numRandom2) {
                echo "El $numRandom1 es mas grande que $numRandom2";
              
            }
            else if ($numRandom2 > $numRandom1) {
                echo "El $numRandom2 es mas grande que $numRandom1";
               
            }
            else {
                echo "los dos numéros son iguales";
               
            }
            echo "</div>";
        }

        //PARTE 2
        function numParImpar (...$numbers) {
        
            echo "<div class='container'> <h2>Números Par/Impar</h2>";

            foreach ($numbers as $number){
                if ($number % 2 == 0){
                    echo "El número $number es par";
                    echo "<br>";
                } else {
                    echo "El número $number es impar";
                    echo "<br>";
                }
            }

            echo "</div>";
        }

        //PARTE 3 OPERACIONES
        function add ($num1,$num2) {
        
            echo "<div class='container'> <h2>Suma</h2>";
            $result = $num1 + $num2;
            echo "Suma: $result";
            
            echo "</div>";
        }

        function subtract ($num1,$num2) {
        
            echo "<div class='container'> <h2>Resta</h2>";
            $result = $num1 - $num2;
            echo "Resta: $result";
            echo "</div>";
        }

        function multiply ($num1,$num2) {
        
            echo "<div class='container'> <h2>Multiplicar</h2>";
            $result = $num1 * $num2;
            echo "Multiplicar: $result";
            echo "</div>";
        }

        function divide ($num1,$num2) {
        
            echo "<div class='container'> <h2>Dividir</h2>";
            $result = $num1 / $num2;
            echo "Dividir: $result";
            echo "</div>";
        }

        function modul ($num1,$num2) {
        
            echo "<div class='container'> <h2>Modulo</h2>";
            $result = $num1 % $num2;
            echo "Modulo: $result";
            echo "</div>";
        }

        function power ($num1,$num2) {
        
            echo "<div class='container'> <h2>Potencia</h2>";
            $result = pow($num1,$num2);
            echo "Potencia: $result";
            echo "</div>";
        }

        //RESULTADOS
        bigNumber($numRandom1, $numRandom2);
        numParImpar($numRandom1,$numRandom2);
        add($numRandom1,$numRandom2);
        subtract($numRandom1,$numRandom2);
        multiply($numRandom1,$numRandom2);
        divide($numRandom1,$numRandom2);
        modul($numRandom1,$numRandom2);
        power($numRandom1,$numRandom2);

    ?>
</body>
</html>