<?php
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */
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
        include_once(__DIR__ . '/front-end/inc/functionsCrud.php');
    ?>
    <div class="bienvenida">
        <!-- SI NO SE ESTA LOGUEADO -->
        <h1>BIENVENIDO A REVELS</h1>
        <span>Registrate ya!</span>
    </div>
    <?php
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
                //La contraseña se encripta
                $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                //Se crea el nuevo usuario y se inserta en la BD
                createUser($user, $hashedPass, $email);

                unset($user, $email, $password, $password2);
            }
        }

    ?>
    <div>
    <form class="login" action="#" method="post" enctype="multipart/form-data">
            Usuario: <input type="text" name="user" value="<?php echo isset($user) ? $user : null ?>">
            <?php if (isset($errors['user'])) echo '<div class="error"> '.$errors['user'].' </div>'; ?>

            Email: <input type="text" name="email" value="<?php echo isset($email) ? $email : null ?>">
            <?php if (isset($errors['email'])) echo '<div class="error"> '.$errors['email'].' </div>'; ?>

            Contraseña: <input type="password" name="password">
            <?php if (isset($errors['password'])) echo '<div class="error"> '.$errors['password'].' </div>'; ?>

            Confirmar contraseña: <input type="password" name="password2">
            <?php if (isset($errors['password2'])) echo '<div class="error"> '.$errors['password2'].' </div>'; ?>

            <input type="submit" value="Registrarme">
        </form>
    </div>
    <?php include_once(__DIR__ . '/front-end/inc/footer.inc.php'); ?>
 </body>
 </html>
