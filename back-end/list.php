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
    <link rel="stylesheet" href="/back-end/styles/style.css">
    <title>List</title>
 </head>
 <body>
    <?php 
        include_once(__DIR__ . '/inc/header.inc.php');
        include_once('../front-end/inc/functionsCrud.php');
    ?>
    <div class="list">
        <ul>
        <?php 
            $revelsUser = getRevelsById($_SESSION['userId']);
    
            foreach ($revelsUser as $revel) {
                echo '<li>'.$revel['texto'].'<a href="/back-end/delete.php?action=delete&revelId='.$revel['id'].'"><img src="/back-end/img/papelera.png" alt="Eliminar" class="delete-icon"></a>
                </li>';
            }
        ?>
        </ul>
    </div>
 </body>
 </html>