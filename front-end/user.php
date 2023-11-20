<?php
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */

    //Mostrará los datos del usuario cuyo id reciba y la cantidad de seguidores que tiene.
    //También se mostrará una lista de todas sus Revels. De cada Revel mostrará los 50 primeros
    //caracteres (que serán un enlace a la página revel) y la cantidad de me gusta y no me gusta de
    //dicha revel

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
    <title>User</title>
</head>
<body>
    <?php 
        include_once(__DIR__ .'/inc/header.inc.php');
        include_once(__DIR__ .'/inc/functionsCrud.php');

        $info = getInfoByUser($_GET['id']);
        $numberFollowers = getNumberFollowersByUser($_GET['id']);
     
        echo '<div class="containerUser">';
            echo '<h3 class="datos">Datos</h3>';
                echo '<span>Usuario: '.$info['usuario'].'</span></br>';
                echo '<span>Email: '.$info['email'].'</span></br>';
                echo '<span>Seguidores: '.$numberFollowers.'</span>';
            echo '<hr>';
            echo '<h3 class="datos">Revels</h3>';
            $userRevels = getRevelsById($info['id']);
            echo '<div class="containerRevels">';

            foreach ($userRevels as $revel) {
              $numberLikes = getNumberLikesByRevel($revel['id']);
              $numberDislikes = getNumberDislikesByRevel($revel['id']);

                echo '<div class="card" style="width: 18rem;">';
                  echo '<div class="card-body">';
                  echo '<p class="card-text">'. $revel['texto']. ';</p>';
                  echo '<p class="card-text">'. $revel['fecha']. ';</p>';
                    echo '<div class="card-footer">';
                      echo '<div class="left-icons">';
                        echo '<span>'.$numberLikes.'</span><img src="/front-end/img/like.png" class="card-icon" alt="like">';
                        echo '<span>'.$numberDislikes.'</span><img src="/front-end/img/dislike.png" class="card-icon" alt="dislike">';
                      echo '</div>';
                    echo '<div class="right-icons">';
                      $number = getNumberCommentsbyRevel($revel['id']);
                    echo '<span>'.$number.'</span><img src="/front-end/img/comment.png" class="card-icon" alt="Comment">';
                  echo '</div>';
                echo '</div>';         
                  echo '</div>';
                echo '</div>';
              }

        echo'</div>';

    ?>    
</body>
</html>