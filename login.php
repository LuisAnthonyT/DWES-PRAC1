<?php
/**
 *	Script que implementa un formulario para loguearse
 * 
 *	@author Luis Anthony Toapanta Bolaños
 */
    session_start();
	require_once('includes/header.inc.php');

    if (!empty($_POST)) {

        $_POST['user'] = trim($_POST['user']);
        $_POST['password'] = trim($_POST['password']);

        if (empty($_POST['user'])) {
            $errors['user'] = 'El campo user esta vacio';
        }

        if (empty($_POST['password'])) {
            $errors['password'] = 'El campo contraseña esta vacio';
        }

        if (empty($errors)) {
            include_once(__DIR__ . '/includes/functionsCrud.php');
            $rol = login($_POST['user'], $_POST['password']);

            if ($rol == null) {
                $errors['login'] = 'Usuario o contraseña incorrecto';
            } else {
                $_SESSION['userName'] = $_POST['user'];
                $_SESSION['rol'] = $rol;

                header("Location: /index.php");
                exit();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/style.css">
    <title>Login</title>
</head>
<body>
    <form action="#" method="post">
        Usuario: <input type="text" name="user"></br>
		<?php  if (isset($errors['user'])) echo '<div class="error"> '.$errors['user'].' </div>'; ?>

        Contraseña: <input type="password" name="password"></br>
		<?php  if (isset($errors['password'])) echo '<div class="error"> '.$errors['password'].' </div>'; ?>
        <?php if (isset($errors['login'])) echo '<div class="error">'.$errors['login'].' </div>'; ?>

        <!-- <label>
        <input type="checkbox" name="remember" value="1"> Mantener sesion</br>
        </label> -->

        <input type="submit" value="Entrar">
    </form>
</body>
</html>