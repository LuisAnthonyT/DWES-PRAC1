<?php
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */

     session_start();
     include_once(__DIR__ .'/inc/header.inc.php');

     //SEGUIR USUARIO 
     if (isset($_GET['action']) && isset($_GET['userId'])) {
         followUserById($_SESSION['userId'], $_GET['userId']);
         header("Location: /index.php");
         exit();
     }

     //VALIDACIONES BUSQQUEDA
     if (!empty($_POST)) {
        $_POST['user'] = trim($_POST['user']);
        
        if (empty($_POST['user'])) {
            $error = 'No hay datos introducidos';
        } 
     }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/front-end/styles/style.css">
    <title>Result</title>
</head>
<body>
    <?php
        if (isset($error)) {
            echo '<div class="error">'.$error.'</div>';
        } else if (isset($_POST['user'])) {
            $users = searchUsers($_SESSION['userId'],$_POST['user']);
        } 
    ?>
    <div class="bienvenida">
        <h1>Resultados de búsqueda</h1>
        <div class="list">
          <ul>
            <?php 
            if (!empty($users)) {
              foreach ($users as $user) {
                $state = getstatefollow($_SESSION['userId'], $user['id']);
                if ($state == 'Seguir') {
                  echo '<li>'.$user['usuario'].'<button type="button" class="btn btn-dark"><a class="seguir" href="/front-end/result.php?action=follow&userId='.$user['id'].'">Seguir</a></button></li>';
                } else {
                  echo '<li>'.$user['usuario'].'<button type="button" class="btn btn-dark"><a class="seguir">Siguiendo</a></button></li>';
                }
              }
            } else {
              echo 'No hay resultados';
            }
            ?>
        </ul>
      </div>
    </div>

    
    
</body>
</html>