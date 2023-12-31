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
        
        //VALIDACIONES

        if (!empty($_POST)) {
    
            if (empty($_POST['title'])) {
                $error['title'] = 'El tiitulo esta vacio';
            } else {
                $title = trim($_POST['title']);
            }
            if (empty($_POST['year'])) {
                $error['year'] = 'El año esta vacio';
            } else {
                $year = trim($_POST['year']);
            }
            if (empty($_POST['format'])) {
                $error['format'] = 'El formato esta vacio';
            } else {
                $format = trim($_POST['format']);
            }
            if (empty($_POST['date'])) {
                $error['date'] = 'La fecha de compra esta vacia';
            } else {
                $rawDate = trim($_POST['date']);
                // Intenta convertir la fecha al formato deseado (YYYY-MM-DD)
                $timestamp = strtotime($rawDate);
                if ($timestamp === false) {
                $error['date'] = 'Formato de fecha no válido';
                } else {
                // Formatea la fecha en el formato deseado (YYYY-MM-DD)
                $date = date('Y-m-d', $timestamp);
        }
            }
            if (empty($_POST['price'])) {
                $error['price'] = 'El precio esta vacio';
            } else {
                $price = trim($_POST['price']);
            }
    
            //SI NO HAY ERRORES DE VALIDACIÓN, SE EJECUTARA EL INSERT
            if (empty($error)) {
    
                $query = $connection->prepare('INSERT INTO ALBUMES (titulo, grupo, anyo, formato, fechacompra, precio) VALUES (?, ?, ?, ?, ?, ?);');
                $query->bindParam(1, $title);
                $query->bindParam(2, $_GET['codigoGrupo']);
                $query->bindParam(3, $year);
                $query->bindParam(4, $format);
                $query->bindParam(5, $date);
                $query->bindParam(6, $price);
                $query->execute();
                
                $title = null;
                $year = null;
                $format = null;
                $date = null;
                $price = null;
    
                echo '<div class="correct">';
                echo "<span> Nuevo álbum insertado </span>";
                echo '</div>';
            }
        }

        if (isset($_GET['codigoGrupo'])) {
   
            $idGroup = $_GET['codigoGrupo'];
            //CONSULTA 1 DATOS DEL GRUPO
            $stmt = $connection->prepare("SELECT * FROM grupos WHERE codigo = :codigo ");
            $stmt->bindParam(':codigo', $idGroup);
            $stmt->execute();

            echo "<div class='container'>";
            echo "<ul>";
                while ($group = $stmt->fetchObject()) {
                    echo "<li> Nombre: $group->nombre </li>";
                    echo "<li> Género: $group->genero </li>";
                    echo "<li> País: $group->pais </li>";
                    echo "<li> Inicio: $group->inicio </li>";
                }
            echo "</ul>";
            echo "</div>";

            unset($stmt);

            //CONSULTA PARA ELIMINAR X ALBUM
            if (isset($_GET['accion']) && $_GET['accion'] == 'delete' && isset($_GET['codigoAlbum'])) {
                $codigoAlbum = $_GET['codigoAlbum'];

                $stmt = $connection->prepare("DELETE FROM albumes WHERE codigo = :codigoAlbum");
                $stmt->bindParam(':codigoAlbum', $codigoAlbum);
                $stmt->execute();
            } 

            //CONSULTA 2 OBTENEMOS LOS ALBUMES

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
                    echo "<td>Eliminar</td>";
                echo "</tr>";

                while ($album = $stmt->fetchObject()) {
                    $albumCode = urlencode($album->codigo);
                    $deleteLink = "/group.php?codigoGrupo=" . $idGroup . "&codigoAlbum=" . $albumCode . "&accion=delete";
                    echo "<tr>";
                        echo '<td><a href="/album.php?codigoGrupo='.$idGroup.'&codigoAlbum=' . $albumCode . '"> ' . $album->titulo . '</a></td>';
                        echo "<td>$album->anyo</td>";
                        echo "<td>$album->formato</td>";
                        echo "<td>$album->fechacompra</td>";
                        echo "<td>$album->precio</td>";
                        echo '<td><a href="'.$deleteLink.'"><img src="/img/papelera.png"></a></td>';
                    echo "</tr>";
                }
            echo "</table>";

            unset($stmt);
            unset($connection);   
        }

    ?>
    <!-- FORMULARIO -->
   <h4>Añadir Álbum</h4>
   <form action="#" method="post">
        <!-- CAMPO OCULTO - PK DEL GRUPO -->
        <input type="hidden" name="idgroup" value="<?php echo $_GET['codigoGrupo']; ?>">

        Introduce un titulo:
        <input type="text" name="title" value="<?php echo isset($title) ? $title : null ?>"></br>
        <?php if (isset($error['title'])) echo "<div class='error'>" . $error['title'] . "</div>"; ?>

        Introduce un año:
        <select name="year">
        <?php
        // Rango de años
        $startYear = 1900;
        $currentYear = date('Y');
        
        for ($year = $currentYear; $year >= $startYear; $year--) {
            $selected = isset($start) && $start == $year ? 'selected' : '';
            echo "<option value=\"$year\" $selected>$year</option>";
        }
        ?>
        </select></br>
        <?php if (isset($error['year'])) echo "<div class='error'>" . $error['year'] . "</div>"; ?>

        Elige un formato: </br>
        <select name="format">
            <option value="vinilo">Vinilo</option>
            <option value="cd">Cd</option>
            <option value="dvd">Dvd</option>
            <option value="mp3">Mp3</option>
        </select>
        </br>

        Introduce una fecha de compra:
        <input type="date" name="date" value="<?php echo isset($date) ? $date : null ?>"></br>
        <?php if (isset($error['date'])) echo "<div class='error'>" . $error['date'] . "</div>"; ?>

        Introduce un precio:
        <input type="text" name="price" value="<?php echo isset($price) ? $price : null ?>"></br>
        <?php if (isset($error['price'])) echo "<div class='error'>" . $error['price'] . "</div>"; ?>

        <input type="submit" value="Añadir">
    </form>
    <footer>
        <a href='/index.php'>Volver</a>
    </footer>

</body>
</html>