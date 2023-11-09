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
    <title>Discografía</title>
</head>
<body>
    <h1><a href="/index.php">Discografía - Luis Anthony</a></h1>
    <h4>Grupos</h4>
    <?php 
    include_once(__DIR__ . '/inc/connection.inc.php');

    //VALIDACIONES
    if (!empty($_POST)) {
    
        if (empty($_POST['name'])) {
            $error['name'] = 'El nombre esta vacio';
        } else {
            $name = trim($_POST['name']);
        }
        if (empty($_POST['genre'])) {
            $error['genre'] = 'El género esta vacio';
        } else {
            $genre = trim($_POST['genre']);
        }
        if (empty($_POST['country'])) {
            $error['country'] = 'El pais esta vacio';
        } else {
            $country = trim($_POST['country']);
        }
        if (empty($_POST['start'])) {
            $error['start'] = 'El inicio esta vacio';
        } else {
            $start = trim($_POST['start']);
        }

        //SI NO HAY ERRORES DE VALIDACIÓN, SE EJECUTARA EL INSERT
        if (empty($error)) {

            $query = $connection->prepare('INSERT INTO GRUPOS (nombre, genero, pais, inicio) VALUES (?, ?, ?, ?);');
            $query->bindParam(1, $name);
            $query->bindParam(2, $genre);
            $query->bindParam(3, $country);
            $query->bindParam(4, $start);
            $query->execute();
            
            $name = null;
            $genre = null;
            $country = null;
            $start = null;

            echo '<div class="correct">';
            echo "<span> Nuevo grupo insertado </span>";
            echo '</div>';
        }
    }

      //CONSULTA PARA ELIMINAR X GRUPO
      if (isset($_GET['accion']) && $_GET['accion'] == 'delete' && isset($_GET['codigoGrupo'])) {
        $codigoGrupo = $_GET['codigoGrupo'];

        $stmt = $connection->prepare("DELETE FROM grupos WHERE codigo = :codigoGrupo");
        $stmt->bindParam(':codigoGrupo', $codigoGrupo);
        $stmt->execute();
    } 

    //OBTENEMOS TODA LA INFO DE LA TABLA GRUPOS
    $result = $connection->query("SELECT * FROM grupos;");

    echo "<div class='container'>";
    echo "<ol class='grupos'>";
        while ($group = $result->fetch()) {
            $groupCode = urlencode($group['codigo']);
            $deleteLink = "/index.php?codigoGrupo=" . $groupCode . "&accion=delete";
            echo '<li><a href="/group.php?codigoGrupo=' . $groupCode . '">Grupo: ' . $group['nombre'] . '</a>';
            echo '<a href="' . $deleteLink . '"><img src="/img/papelera.png" alt="Eliminar"></a>';
            echo '</li>';
        }
    echo "</ol>";
    echo "</div>";

    unset($result);
    unset($connection);  
    ?>

   <!-- FORMULARIO -->
   <h4>Añadir Grupos</h4>
   <form action="#" method="post">
        Introduce un nombre:
        <input type="text" name="name" value="<?php echo isset($name) ? $name : null ?>"></br>
        <?php if (isset($error['name'])) echo "<div class='error'>" . $error['name'] . "</div>"; ?>

        Introduce un género:
        <input type="text" name="genre" value="<?php echo isset($genre) ? $genre : null ?>"></br>
        <?php if (isset($error['genre'])) echo "<div class='error'>" . $error['genre'] . "</div>"; ?>

        Introduce un país:
        <input type="text" name="country" value="<?php echo isset($country) ? $country : null ?>"></br>
        <?php if (isset($error['country'])) echo "<div class='error'>" . $error['country'] . "</div>"; ?>

        Introduce el inicio:
        <input type="text" name="start" value="<?php echo isset($start) ? $start : null ?>"></br>
        <?php if (isset($error['start'])) echo "<div class='error'>" . $error['start'] . "</div>"; ?>

        <input type="submit" value="Añadir">
   </form>
</body>
</html>
