<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul class="navbar">
        <?php 

        for ($a=1; $a<6; $a++){
            echo "<li><a href='#sec$a'> Sección $a </a></li>";
        } 
        
         ?>   
    </ul>
    <section id="sec1">
        <h1>Negativo - Cero - Positivo</h1>
        <?php 
            $numRandom = rand(-200,200);
            if($numRandom > 0){
                echo "El numero $numRandom es Positivo";
            } 
            if  ($numRandom == 0){
                echo "El numero $numRandom es cero";
            }
            if($numRandom < 0){
                echo "El numero $numRandom es negativo";
            }

        ?>
    </section>
    <section id="sec2">
        <h1>Nota</h1>
        <?php 
            $notaMedia = rand(0,10);
            switch ($notaMedia){
                case 0:
                        echo "La nota $notaMedia es insuficiente";
                    break;
                case 1: 
                        echo "La nota $notaMedia es insuficiente";
                    break;
                case 2: 
                        echo "La nota $notaMedia es insuficiente";
                    break;
                    
                case 3: 
                        echo "La nota $notaMedia es necesita mejorar";
                    break;
                
                case 4: 
                    echo "La nota $notaMedia es necesita mejorar";
                    break;
                case 5: 
                    echo "La nota $notaMedia es aprobado justito";
                    break;
                case 6:
                    echo "La nota $notaMedia es aprobado";
                    break;
                case 7:
                    echo "La nota $notaMedia es notable bajo";
                    break;
                case 8:
                    echo "La nota $notaMedia es notable";
                    break;
                case 9:
                    echo "La nota $notaMedia es sobresaliente";
                    break;
                case 10:
                    echo "La nota $notaMedia es sobresaliente";
                
                }
        ?>
    </section>
    <section id="sec3">
        <h1>Tabla de multiplicar del 36</h1>
        <table>
            <tr>
                <th>Multiplicando</th>
                <th>Resultado</th>
            </tr>
            <?php 
            $numTabla = rand(0,100);
            for($a=0; $a<=20; $a++){
                $result = $numTabla * $a;

                echo "<tr><td>$numTabla * $a</td><td>$result</td></tr>";
                
            }
            ?>
        </table>
    </section>
    <section id="sec4">
        <h1>Tabla de x filas y x columnas</h1>
        <table>
            <?php 
            //Fila
            $numRandom1 = rand(1,10);
            //Columna
            $numRandom2 = rand(1,10);

            for($a= 0; $a<$numRandom1; $a++){
                echo "<tr></tr>";
                for($b= 0; $b<$numRandom2; $b++){
                    echo "<td>$numRandom1 x $numRandom2</td>";
                    
                }
            }

            ?>
        </table>
    </section>
    <section id="sec5">
        <h1>Cálcula del cambio</h1>
            <?php 
            $numRandom = rand(1,1000);

            echo "<p>Valor: $numRandom</p>";
            echo "<p>Descomposición en billetes y monedas:</p>";

        
            $billetes500 = intval($numRandom / 500);
            $numRandom %= 500;

            $billetes200 = intval($numRandom / 200);
            $numRandom %= 200;

            $billetes100 = intval($numRandom / 100);
            $numRandom %= 100;

            $billetes50 = intval($numRandom / 50);
            $numRandom %= 50;

            $billetes20 = intval($numRandom / 20);
            $numRandom %= 20;

            $billetes10 = intval($numRandom / 10);
            $numRandom %= 10;

            $billetes5 = intval($numRandom / 5);
            $numRandom %= 5;

           
            $monedas2 = intval($numRandom / 2);
            $numRandom %= 2;

            $monedas1 = $numRandom;

    
            echo "<p>Billetes de 500: $billetes500</p>";
            echo "<p>Billetes de 200: $billetes200</p>";
            echo "<p>Billetes de 100: $billetes100</p>";
            echo "<p>Billetes de 50: $billetes50</p>";
            echo "<p>Billetes de 20: $billetes20</p>";
            echo "<p>Billetes de 10: $billetes10</p>";
            echo "<p>Billetes de 5: $billetes5</p>";
            echo "<p>Monedas de 2: $monedas2</p>";
            echo "<p>Monedas de 1: $monedas1</p>";
                
            ?>
    </section>
</body>
</html>