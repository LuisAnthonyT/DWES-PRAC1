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
        $numRandom1 = rand(0,10);
        $numRandom2 = rand(0,10);

        echo "<div class='container'> <h2>Números Random</h2>";
        echo "Números random:  $numRandom1  ,  $numRandom2";
        echo "</div>";
        echo "<hr>";

        // PARTE 1
        function bigNumber ($numRandom1, $numRandom2) {

            echo "<div class='container'> <h2>Número más grande</h2>";
            if ($numRandom1 > $numRandom2) {
                echo "El $numRandom1 es mas grande que $numRandom2";
                echo "<hr>";
            }
            else if ($numRandom2 > $numRandom1) {
                echo "El $numRandom2 es mas grande que $numRandom1";
                echo "<hr>";
            }
            else {
                echo "los dos numéros son iguales";
                echo "<hr>";
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
                }
            }

            echo "</div>";
        }

        //PARTE 3
        function sumar (...$numbers) {
            echo "<hr>";
            echo "<div class='container'> <h2>Suma</h2>";
            $suma = 0;
            foreach($numbers as $number){
                $suma += $number;
            }
            echo "Suma: $suma";
            echo "</div>";
        }


        bigNumber($numRandom1, $numRandom2);
        numParImpar($numRandom1,$numRandom2);
        sumar($numRandom1,$numRandom2);

    
    ?>
</body>
</html>