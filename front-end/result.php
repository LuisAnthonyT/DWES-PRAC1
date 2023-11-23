<?php
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */

     session_start();
     include_once(__DIR__ .'/inc/header.inc.php');

     //VALIDACIONES
     if (!empty($_POST)) {
        $_POST['user'] = trim($_POST['user']);
        
        if (empty($_POST['user'])) {
            $error = 'No hay datos introducidos';
        } else {
            
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
        }    
    ?>
    
    
</body>
</html>