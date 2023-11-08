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
                $date = trim($_POST['date']);
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
                $query->bindParam(2, $_GET['codigo']);
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

        if (isset($_GET['codigo'])) {
   
            $idGroup = $_GET['codigo'];
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

    ?>
    <!-- FORMULARIO -->
   <h4>Añadir Álbum</h4>
   <form action="#" method="post">
        <!-- CAMPO OCULTO - PK DEL GRUPO -->
        <input type="hidden" name="idgroup" value="<?php echo $_GET['codigo']; ?>">

        Introduce un titulo:
        <input type="text" name="title" value="<?php echo isset($title) ? $title : null ?>"></br>
        <?php if (isset($error['title'])) echo "<div class='error'>" . $error['title'] . "</div>"; ?>

        Introduce un año:
        <input type="text" name="year" value="<?php echo isset($year) ? $year : null ?>"></br>
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
        <input type="text" name="date" value="<?php echo isset($date) ? $date : null ?>"></br>
        <?php if (isset($error['date'])) echo "<div class='error'>" . $error['date'] . "</div>"; ?>

        Introduce un precio:
        <input type="text" name="price" value="<?php echo isset($price) ? $price : null ?>"></br>
        <?php if (isset($error['price'])) echo "<div class='error'>" . $error['price'] . "</div>"; ?>

        <input type="submit" value="Añadir">

    <footer>
        <a href='/index.php'>Volver</a>
    </footer>
</body>
</html>