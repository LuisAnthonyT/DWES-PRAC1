<?php
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */

     session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css">
    <title>Revel</title>
</head>
<body>
    <?php 
        include_once(__DIR__ .'/inc/header.inc.php');
        include_once(__DIR__ .'/inc/functionsCrud.php');

        if (isset($_GET['idRevel'])) {
            $revel = getRevelById($_GET['idRevel']);
        }
    ?>
    <div class="containerUser">
        <h3><?php echo $revel->texto?></h3>
        <span>Fecha: <?php echo $revel->fecha?></span>
    </div>
    <hr>
    <?php 
        $comments = getCommentsByRevel($_GET['idRevel']);

        if (!empty($comments)) {
            echo '<h3>Comentarios</h3>';
            echo '<div class="containerRevels">';
            foreach ($comments as $comment) {
                echo '<div class="card" style="width: 18rem;">';
                      echo '<div class="card-body">';
                      echo '<p class="card-text">'. $comment['texto']. ';</p>';
                        echo '<div class="card-footer">';
                            echo '<p class="card-text">'. $comment['fecha']. ';</p>';
                        echo '</div>';         
                      echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<span>No hay comentarios</span>';
        }
    ?>
        <hr>
        <h3>Deja tu comentario</h3>
        <div class="containerComments">
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Comments</label>
            <button type="submit">Enviar</button>
        </div>
        </div>
    </div>
</body>
</html>