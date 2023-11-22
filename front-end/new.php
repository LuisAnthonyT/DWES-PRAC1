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
    <title>New</title>
</head>
<body>
    <?php
        include_once(__DIR__ .'/inc/header.inc.php');

        //VALIDACIONES
        if (!empty($_POST)) {
          $_POST['revel'] = trim($_POST['revel']);

          if (empty($_POST['revel'])) {
              $error = 'El campo texto esta vacio';
          } 

          if (empty($error)) {
            if (isset($_SESSION['userId'])) {
                include_once(__DIR__ . '/inc/functionsCrud.php');
  
                postRevel($_SESSION['userId'], $_POST['revel']);
                header('Location: /index.php');
                exit();
            }
          }
        }
    ?>

    <form class="login" action="#" method="post">
        Introduce un texto:
        <input type="text" name="revel"><br>
        <?php if (isset($error)) echo '<div class="error"> '. $error .' </div>' ?>
        
        <input type="submit" value="Subir">
    </form>

    
</body>
</html>