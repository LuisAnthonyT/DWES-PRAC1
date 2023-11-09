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

         //VALIDACIONES

         if (!empty($_POST)) {
    
            if (empty($_POST['title'])) {
                $error['title'] = 'El tiitulo esta vacio';
            } else {
                $title = trim($_POST['title']);
            }
            if (empty($_POST['duration'])) {
                $error['duration'] = 'La duración esta vacio';
            } else {
                $duration = trim($_POST['duration']);
            }
            if (empty($_POST['position'])) {
                $error['position'] = 'La posición esta vacia';
            } else {
                $position = trim($_POST['position']);
            }
           
            //SI NO HAY ERRORES DE VALIDACIÓN, SE EJECUTARA EL INSERT
            if (empty($error)) {
    
                $query = $connection->prepare('INSERT INTO CANCIONES (titulo, album, duracion, posicion) VALUES (?, ?, ?, ?);');
                $query->bindParam(1, $title);
                $query->bindParam(2, $_GET['codigoAlbum']);
                $query->bindParam(3, $duration);
                $query->bindParam(4, $position);
                $query->execute();
                
                $title = null;
                $duration = null;
                $position = null;
    
                echo '<div class="correct">';
                echo "<span> Nuevo canción insertada </span>";
                echo '</div>';
            }
        }
        //CONSULTA PARA ELIMINAR X CANCION
        if (isset($_GET['accion']) && $_GET['accion'] == 'delete' && isset($_GET['codigoCancion'])) {
            $codigoCancion = $_GET['codigoCancion'];

            $stmt = $connection->prepare("DELETE FROM canciones WHERE codigo = :codigoCancion");
            $stmt->bindParam(':codigoCancion', $codigoCancion);
            $stmt->execute();
        }

        //Mostrar el nombre del grupo, el título del álbum y las canciones de ese álbum en forma de tabla.
        if (isset($_GET['codigoAlbum'])) {
            $idAlbum = $_GET['codigoAlbum'];

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

            echo '<h4>Nombre del grupo: '. $groupName['nombre'] .'</h4>';
            echo '<h4> Titulo del album: ' . $titleAlbum['titulo'] . '</h4>'; 
       
        //CANCIONES
        echo "<h3>Canciones</h3>";
            echo "<table>";
                echo "<tr>";
                    echo "<td>Titulo</td>";
                    echo "<td>Duracion</td>";
                    echo "<td>Posicion</td>";
                    echo "<td>Eliminar</td>";
                echo "</tr>";

                while ($song = $stmt3->fetchObject()) {
                    $albumCode = urldecode($song->album);
                    $deleteLink = "/album.php?codigoAlbum=" . $albumCode . "&codigoCancion=" . $song->codigo . "&accion=delete";
                    echo "<tr>";
                        echo '<td>' . $song->titulo .'</td>';
                        echo '<td>' . $song->duracion .'</td>';
                        echo '<td>' . $song->posicion .'</td>';
                        echo '<td><a href="'. $deleteLink.'"><img src="/img/papelera.png"></a></td>';
                    echo "</tr>";
                }
            echo "</table>";

        unset($stmt);
        unset($stmt2);
        unset($stmt3);
        unset($connection);
    ?>
    <!-- FORMULARIO -->
   <h4>Añadir canción</h4>
   <form action="#" method="post">
        <!-- CAMPO OCULTO - PK DEL GRUPO -->
        <input type="hidden" name="pkAlbum" value="<?php echo $_GET['codigoAlbum']; ?>">

        Introduce un titulo:
        <input type="text" name="title" value="<?php echo isset($title) ? $title : null ?>"></br>
        <?php if (isset($error['title'])) echo "<div class='error'>" . $error['title'] . "</div>"; ?>

        Introduce una duración:
        <input type="text" name="duration" value="<?php echo isset($duration) ? $duration : null ?>"></br>
        <?php if (isset($error['duration'])) echo "<div class='error'>" . $error['duration'] . "</div>"; ?>

        Introduce una posición:
        <input type="text" name="position" value="<?php echo isset($position) ? $position : null ?>"></br>
        <?php if (isset($error['position'])) echo "<div class='error'>" . $error['position'] . "</div>"; ?>

        <input type="submit" value="Añadir">
    </form>
    <footer>
            <?php 
                echo '<a href="/group.php?codigoGrupo='.$_GET['codigoGrupo'].'">Volver</a>';
                
            ?>
        </footer>
</body>
</html>