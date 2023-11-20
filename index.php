<?php
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */

     session_start();

     if (!isset($_SESSION['rol'])) {
        $_SESSION['rol'] = 'invitado';
    }
?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="front-end/styles/style.css">
    <title>Revels</title>
 </head>
 <body>
     <?php
        include_once(__DIR__ .'/front-end/inc/header.inc.php');
        include_once(__DIR__ . '/front-end/inc/functions.inc.php');

        //VALIDACIONES
        if (!empty($_POST)) {
            if (empty($_POST['user'])) {
                $errors['user'] = 'El campo usuario esta vacio';
            } else {
                if (!validarDatos($exprName, $_POST['user'])) {
                    $errors['user'] = 'El campo usuario no es válido. Debe contener solo letras';
                }
                $user = trim($_POST['user']);
            }

            if (empty($_POST['email'])) {
                $errors['email'] = 'El campo email esta vacio';
            } else {
                if (!validarDatos($exprMail, $_POST['email'])) {
                    $errors['email'] = 'El campo email no es válido. Debe contener letras o números, un @ y un dominio';
                }
                $email = trim($_POST['email']);
            }

            if (empty($_POST['password'])) {
                $errors['password'] = 'El campo contraseña esta vacio';
            } else {
                $password = trim($_POST['password']);
            }

            if (empty($_POST['password2'])) {
                $errors['password2'] = 'El campo confirmar contraseña esta vacio';
            } else {
                if ($password != $_POST['password2']) {
                $errors['password2'] = 'Las contraseñas no coinciden';
                } else {
                    $password2 = trim($_POST['password2']);
                }
            }
            //SI NO HAY ERRORES, SE CREARÁ UN NUEVO USUARIO
            if (empty($errors)) { 
                include_once(__DIR__ . '/front-end/inc/functionsCrud.php');
                //La contraseña se encripta
                $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                //Se crea el nuevo usuario y se inserta en la BD
                createUser($user, $hashedPass, $email);

                unset($user, $email, $password, $password2);
            }
        }

        //SI EL USUARIO NO ESTA LOGUEADO SE MOSTRARÁ ESTA VISTA
        if ($_SESSION['rol'] == 'invitado') {
            echo '<div class="bienvenida">';
                echo '<h1>BIENVENIDO A REVELS</h1>';
                echo '<span>Registrate ya!</span>';
            echo '</div>';

            //FORMULARIO
            echo '<div>';
                echo '<form class="login" action="#" method="post" enctype="multipart/form-data">';

                    echo 'Usuario: <input type="text" name="user" value="' . (isset($user) ? $user : null) . '">';
                    if (isset($errors['user'])) echo '<div class="error"> '.$errors['user'].' </div>';

                    echo 'Email: <input type="text" name="email" value="'. (isset($email) ? $email : null).'">';
                    if (isset($errors['email'])) echo '<div class="error"> '.$errors['email'].' </div>'; 

                    echo 'Contraseña: <input type="password" name="password">';
                    if (isset($errors['password'])) echo '<div class="error"> '.$errors['password'].' </div>';

                    echo 'Confirmar contraseña: <input type="password" name="password2">';
                    if (isset($errors['password2'])) echo '<div class="error"> '.$errors['password2'].' </div>';

                    echo '<input type="submit" value="Registrarme">';
                echo '</form>';
            echo '</div>';
        } else {
            include_once(__DIR__ . '/front-end/inc/functionsCrud.php');

            // Revels del usuario logueado
            $userRevels = getRevelsById($_SESSION['userId']);

            // Revels de los usuarios seguidos por el usuario logueado
            $followedRevels = getRevelsByFollowedUsers($_SESSION['userId']);
            
            echo '<div class="containerRevels">';
            //REVELS DEL USUARIO LOGUEADO
            foreach ($userRevels as $revel) {
                echo '<div class="card" style="width: 18rem;">';
                  echo '<div class="card-body">';
                  echo '<a href="/front-end/user.php?id=' . $_SESSION['userId'] . '" class="card-link">' . $_SESSION['userName'] . '</a>';
                  echo '<a href="/front-end/revel.php?id='.$revel['id'].'"><p class="card-text">'. $revel['texto']. ';</p></a>';
                  echo '<p class="card-text">'. $revel['fecha']. ';</p>';
                    echo '<div class="card-footer">';
                      echo '<div class="left-icons">';
                        echo '<img src="/front-end/img/like.png" class="card-icon" alt="like">';
                        echo '<img src="/front-end/img/dislike.png" class="card-icon" alt="dislike">';
                      echo '</div>';
                    echo '<div class="right-icons">';
                      $number = getNumberCommentsbyRevel($revel['id']);
                    echo '<span>'.$number.'</span><img src="/front-end/img/comment.png" class="card-icon" alt="Comment">';
                  echo '</div>';
                echo '</div>';         
                  echo '</div>';
                echo '</div>';
              }

            echo '</div>';

            echo '<div class="containerRevels">';
            // Revels de los usuarios seguidos
            foreach ($followedRevels as $revel) {
                echo '<div class="card" style="width: 18rem;">';
                echo '<div class="card-body">';
                echo '<a href="/front-end/user.php?id=' . $revel['id_usuario'] .'" class="card-link">' . $revel['nombre_usuario'] . '</a>';
                echo '<a class="textoRevel" href="/front-end/revel.php?idRevel='.$revel['id'].'"><p class="card-text">' . $revel['texto'] . ';</p></a>';
                echo '<p class="card-text">' . $revel['fecha'] . ';</p>';
                echo '<div class="card-footer">';
                echo '<div class="left-icons">';
                echo '<img src="/front-end/img/like.png" class="card-icon" alt="like">';
                echo '<img src="/front-end/img/dislike.png" class="card-icon" alt="dislike">';
                echo '</div>';
                echo '<div class="right-icons">';
                $number = getNumberCommentsbyRevel($revel['id']);
                echo '<span>' . $number . '</span><img src="/front-end/img/comment.png" class="card-icon" alt="Comment">';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }   
            echo '</div>';
        }

      include_once(__DIR__ . '/front-end/inc/footer.inc.php'); 
    ?>
 </body>
 </html>
