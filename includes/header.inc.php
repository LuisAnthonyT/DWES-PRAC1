<?php
/**
 *
 * @author Luis Anthony Toapanta Bolaños
 */

if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    // Destruir la sesión
    session_destroy();

    // Establecer el rol como 'invitado'
    $_SESSION['rol'] = 'invitado';

    // Redirigir al usuario a la página de inicio
    header("Location: /index.php");
    exit();
}
 //IDIOMAS
 require_once(__DIR__ . '/lang/es.inc.php');
 $languages = ['es', 'ca', 'en'];

 if (isset($_GET['language'])) {
   if (in_array($_GET['language'], $languages)) {
       setcookie('language', $_GET['language'], time() + 3600);
       header('Location: '.$_SERVER['PHP_SELF'].'');
       exit();
   }
 }

if ($_SESSION['rol'] == 'invitado') { 
    echo '<header>';
        echo '<h1><a href="/index.php">'.$message['header.title'].'</a></h1>';
        echo '<a href="/index.php">'.$message['header.main'].'</a>';
        echo '<div class "containerLanguage">';
          echo '<a href="/?language=es"><img class="icono" src="/img/languages/español.png" alt="español"></img></a>';
          echo '<a href="/?language=ca"><img class="icono" src="/img/languages/valencià.png" alt="valencià"></img></a>';
          echo '<a href="/?language=en"><img class="icono" src="/img/languages/english.png" alt="english"></img></a>';
        echo '</div>';
    echo '</header>';
} else if ($_SESSION['rol'] == 'customer') {
    echo '<header>';
        echo '<h1><a href="/index.php">MerchaShop</a></h1>';
        echo '<a href="/index">Principal</a></br>';
        echo '<span>'.$_SESSION['userName'].'</span></br>';
        echo '<a href="/?logout=1">Logout</a>';
        echo '<div class "containerLanguage">';
          echo '<a href="/?language=español"><img class="icono" src="/img/languages/español.png" alt="español"></img></a>';
          echo '<a href="/?language=valencià"><img class="icono" src="/img/languages/valencià.png" alt="valencià"></img></a>';
          echo '<a href="/?language=english"><img class="icono" src="/img/languages/english.png" alt="english"></img></a>';
        echo '</div>';
    echo '</header>';
} else {
    echo '<header>';
        echo '<h1><a href="/index.php">MerchaShop</a></h1>';
        echo '<a href="/index.php">Principal</a></br>';
        echo '<span>'.$_SESSION['userName'].'</span></br>';
        echo '<a href="/?logout=1">Logout</a></br>';
        echo '<a href="/users.php">User</a>';
        echo '<div class "containerLanguage">';
          echo '<a href="/?language=español"><img class="icono" src="/img/languages/español.png" alt="español"></img></a>';
          echo '<a href="/?language=valencià"><img class="icono" src="/img/languages/valencià.png" alt="valencià"></img></a>';
          echo '<a href="/?language=english"><img class="icono" src="/img/languages/english.png" alt="english"></img></a>';
        echo '</div>';
    echo '</header>';
}
?>
