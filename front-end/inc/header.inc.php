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
        echo '<a class="new" href= "/front-end/new.php">New</a>';
        echo '<a class="close" href= "/index.php">Salir</a>';
        echo '</form>';
      echo '</div>';
    echo '</nav>';

    echo '<div class="sidebar">';
    echo '<h4>Seguidos</h4>';
      echo "<li>";
        echo '<ul>User 1</ul>';
        echo '<ul>User 2</ul>';
        echo '<ul>User 2</ul>';
        echo '<ul>User 4</ul>';
        echo '<ul>User 1</ul>';
        echo '<ul>User 2</ul>';
        echo '<ul>User 2</ul>';
        echo '<ul>User 4</ul>';
      echo "</li>";
    echo '</div>';
  }
?>