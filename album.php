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
    <title>Álbum</title>
</head>
<body>
    <h1><a href="/index.php">Discografía - Luis Anthony</a></h1>
    <?php 
        include_once(__DIR__ . '/inc/connection.inc.php');

        //Mostrar el nombre del grupo, el título del álbum y las canciones de ese álbum en forma de tabla.
        if (isset($_GET['codigo'])) {
            $idAlbum = $_GET['codigo'];

            //CONSULTA 1 NOMBRE DEL GRUPO
            $stmt = $connection->prepare("SELECT g.nombre FROM grupos g, albumes a  WHERE g.codigo = a.grupo");
            $stmt->execute();
            $groupName = $stmt->fetch();

            //CONSULTA 2 TITULO DEL ALBUM
            $stmt2 = $connection->prepare("SELECT titulo FROM albumes WHERE codigo =:codigoAlbum");
            $stmt2->bindParam(':codigoAlbum', $idAlbum);
            $stmt2->execute();
            $titleAlbum = $stmt2->fetch();

            //CONSULTA 3 CANCIONES
            $stmt3 = $connection->prepare("SELECT * FROM canciones  WHERE album = :codigoAlbum");
            $stmt3->bindParam(':codigoAlbum', $idAlbum);
            $stmt3->execute();
        }

        echo "<ul>";
            echo '<li> Nombre del grupo: '. $groupName['nombre'] .'</li>';
            echo '<li> Titulo del album: ' . $titleAlbum['titulo'] . '</li>';
        echo "</ul>";

        //CANCIONES
        echo "<h3>Canciones</h3>";
            echo "<table>";
                echo "<tr>";
                    echo "<td>Titulo</td>";
                    echo "<td>Duracion</td>";
                    echo "<td>Posicion</td>";
                echo "</tr>";

                while ($song = $stmt3->fetchObject()) {
                    echo "<tr>";
                        echo '<td>' . $song->titulo .'</td>';
                        echo '<td>' . $song->duracion .'</td>';
                        echo '<td>' . $song->posicion .'</td>';
                    echo "</tr>";
                }
            echo "</table>";

        unset($stmt);
        unset($stmt2);
        unset($stmt3);
        unset($connection);

        echo "<footer>";
           // echo "<a href='/group.php?codigo=$idAlbum'>Volver</a>";
        echo "</footer>";
    ?>
</body>
</html>