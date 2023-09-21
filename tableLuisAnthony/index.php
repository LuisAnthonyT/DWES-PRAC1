<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="/index.css">
</head>
<body>
    <main>
    <h1>Luis Anthony Toapanta Bolaños</h1>
    <img src="imagen.jpg" alt="Luis Anthony">
    <table>      
        <?php 

        //a = fila
        //b = columna
        echo "<tr><td class='simbol'>X</td>";
        for($a=1; $a<=10; $a++ ){
            echo "<td class='firstFila'> $a </td>";
        }
        echo "</tr>";

        for($a=1; $a<=10; $a++ ){
            echo "<tr><td class='firstCol'>$a</td>";
            for($b=1; $b<=10; $b++){
                $result = $a * $b;
                echo "<td>$result </td>";
            }
            echo "</tr>";
        }
        
        ?>
        </main>
    </table>
    
</body>
</html>