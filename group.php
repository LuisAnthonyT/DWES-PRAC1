<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/discografia.css">
    <title>Grupos</title>
</head>
<body>
    <h1><a href="/index.php">Discografía - Luis Anthony</a></h1>
    <?php 
        include_once(__DIR__ . '/inc/connection.inc.php');

        if (isset($_GET['codigo'])) {
   
            $idGroup = $_GET['codigo'];
            //CONSULTA 1
            $stmt = $connection->prepare("SELECT * FROM grupos WHERE codigo = :codigo ");
            $stmt->bindParam(':codigo', $idGroup);
            $stmt->execute();

            echo "<ul>";
                while ($group = $stmt->fetchObject()) {
                    echo "<li> Nombre: $group->nombre </li>";
                    echo "<li> Género: $group->genero </li>";
                    echo "<li> País: $group->pais </li>";
                    echo "<li> Inicio: $group->inicio </li>";
                }
            echo "</ul>";

            unset($stmt);

            //CONSULTA 2

            $stmt = $connection->prepare("SELECT * FROM albumes WHERE grupo=:codigo");
            $stmt->bindParam(':codigo', $idGroup);
            $stmt->execute();

            echo "<h3>Álbumes</h3>";
            echo "<table>";
                echo "<tr>";
                    echo "<td>Titulo</td>";
                    echo "<td>Año</td>";
                    echo "<td>Formato</td>";
                    echo "<td>Fecha Compra</td>";
                    echo "<td>Precio</td>";
                echo "</tr>";

                while ($album = $stmt->fetchObject()) {
                    $albumCode = urlencode($album->codigo);
                    echo "<tr>";
                        echo '<td><a href="/album.php?codigo=' . $albumCode . '"> ' . $album->titulo . '</a></td>';
                        echo "<td>$album->anyo</td>";
                        echo "<td>$album->formato</td>";
                        echo "<td>$album->fechacompra</td>";
                        echo "<td>$album->precio</td>";
                    echo "</tr>";
                }
            echo "</table>";

            unset($stmt);
            unset($connection);   
        }

        echo "<footer>";
            echo "<a href='/index.php'>Volver</a>";
        echo "</footer>";
    ?>
</body>
</html>