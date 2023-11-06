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
    <?php 
    include_once(__DIR__ . '/inc/connection.inc.php');

    //OBTENEMOS TODA LA INFO DE LA TABLA GRUPOS
    $result = $connection->query("SELECT * FROM grupos;");

    echo "<ol>";
        while ($group = $result->fetch()) {
            $groupCode = urlencode($group['codigo']);
            echo '<li><a href="/group.php?codigo=' . $groupCode . '">Grupo: ' . $group['nombre'] . '</a></li>';
        }
    echo "</ol>";

    unset($result);
    unset($connection);   
   ?>
</body>
</html>
