<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */

     // SI EL USUARIO NO ESTA LOGUEADO 
     if ($_SESSION['rol'] == 'invitado') {
     
      echo '<nav class="navbar bg-dark">';
        echo '<div class="container-fluid">';
          echo '<a href="/index.php" class="logo">Revels</a>';
          echo '<a href= "front-end/login.php">Login</a>';
        echo '</div>';
      echo '</nav>';

    } else {

    //SI EL USUARIO SI ESTA LOGUEADO
    echo '<nav class="navbar bg-dark">';
      echo '<div class="container-fluid">';
        echo '<a href="/index.php" class="logo">Revels</a>';
        echo '<form class="d-flex" role="search">';
        echo '<input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">';
        echo '<button class="btn btn-light" type="submit">Buscar</button>';
        echo '<a class="userName" href="/back-end/account.php">' . $_SESSION['userName'] . '</a>';
        echo '<a class="new" href= "/front-end/new.php?userId='.$_SESSION['userId'].'">New</a>';
        echo '<a class="close" href= "/?logout=1">Salir</a>';
        echo '</form>';
      echo '</div>';
    echo '</nav>';

    include_once(__DIR__ . '/functionsCrud.php');
    $usersFollowed = getFollowersByUser($_SESSION['userId']);

    echo '<div class="sidebar">';
    echo '<h4>Seguidos</h4>';
      echo "<li>";
        foreach ($usersFollowed as $user) {
          echo '<ul>'.$user['usuario'].'</ul>';
        }
      echo "</li>";
    echo '</div>';

      if (isset($_GET['logout']) && $_GET['logout'] == 1) {
        // Destruir la sesión
        session_destroy();

        // Establecer el rol como 'invitado'
        $_SESSION['rol'] = 'invitado';

        // Redirigir al usuario a la página de inicio
        header("Location: /index.php");
        exit();
      }
  }
?>