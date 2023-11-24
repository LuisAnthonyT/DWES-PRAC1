<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */

     session_start();

     include_once(__DIR__ . '/inc/header.inc.php');
     include_once('../front-end/inc/functionsCrud.php');

     if (!empty($_GET)) {
        if (isset($_GET['confirmar'])) {
            deleteAccount($_SESSION['userId']);
            session_destroy();
            header('Location: /index.php');
            exit();
        }
     }
?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/back-end/styles/style.css">
    <title>Cancel</title>
 </head>
 <body>
    <div class="bienvenida">
        <form class="login" method="get" action="">
            <p>¿Estás seguro de que deseas cancelar tu cuenta?</p>
            <label>
            <input type="checkbox" name="confirmar" required>
            Sí, confirmo la cancelación de mi cuenta.
            </label>
            <br>
            <button type="submit">Aceptar</button>
        </form>
    </div>
 </body>
 </html>