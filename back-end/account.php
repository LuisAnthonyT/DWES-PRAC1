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
    <title>Account</title>
 </head>
 <body>
    <?php 
        include_once(__DIR__ . '/inc/header.inc.php');
        include_once('../front-end/inc/functionsCrud.php');

        //VALIDACIONES
        if (!empty($_POST)) {
            $_POST['user'] = trim($_POST['user']);
            $_POST['email'] = trim($_POST['email']);

            if (empty($_POST['user'])) {
                $errors['user'] = 'El campo usuario esta vacio';
            }

            if (empty($_POST['email'])) {
                $errors['email'] = 'El campo email esta vacio';
            }

            if (empty($errors)) {
                updateUser($_POST['user'], $_POST['email'], $_SESSION['userId']);
            }
        }

        $user = getInfoByUser($_SESSION['userId']);

    ?>
    <div class="bienvenida">
        <h3>Mis datos</h3>
        <form class="login" action="#" method="post">
          Usuario:
          <input type="text" name="user" value="<?php echo $user['usuario'] ?>"></br>
          <?php if (isset($errors['user'])) echo '<div class="error"> '.$errors['user'].' </div>'; ?>

          Email:
          <input type="text" name="email" value="<?php echo $user['email'] ?>"></br>
          <?php if (isset($errors['email'])) echo '<div class="error"> '.$errors['email'].' </div>'; ?>

          <input type="submit" value="Editar">
        </form>

        <a href="/back-end/list.php"><span>Listas mis revels</span></a><br>
        <a href="/back-end/cancel.php"><span>Eliminar cuenta</span></a>
    </div>
 </body>
 </html>