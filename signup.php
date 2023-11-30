<?php
/**
 *	Script que implementa un formulario para registrarse
 * 
 *	@author Luis Anthony Toapanta Bolaños
 */
    if (!empty($_POST)) {

        $_POST['user'] = trim($_POST['user']);
        $_POST['email'] = trim($_POST['email']);
        $_POST['password'] = trim($_POST['password']);
        $_POST['password2'] = trim($_POST['password2']);

        if (empty($_POST['user'])) {
            $errors['user'] = 'El campo user esta vacio';
        }
        if (empty($_POST['email'])) {
            $errors['email'] = 'El campo email esta vacio';
        }
        if (empty($_POST['password'])) {
            $errors['password'] = 'El campo contraseña esta vacio';
        }
        if (empty($_POST['password2'])) {
            $errors['password2'] = 'El campo confirmar contraseña esta vacio';
        }
        if ($_POST['password'] != $_POST['password2']) {
            $errors['passfalse'] = 'Las contraseñas no coinciden';
        }

        if (empty($errors)) {
            //SI NO HAY ERRORES SE ENCRIPTA LA CONTRASEÑA Y SE CREA EL USUARIO
            $hashedPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            include_once(__DIR__ . '/includes/functionsCrud.php');

             //Se crea el nuevo usuario y se inserta en la BD
             $state = createUser($_POST['user'], $_POST['email'], $hashedPass);

             if ($state) {
                 $_SESSION['userName'] = $_POST['user'];
                 $_SESSION['rol'] = 'customer';
    
                 header("Location: /login.php");
                 exit();
             } else {
                $errors['incorrect'] = 'El usuario o email ya existe';
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
    <title>Signup</title>
</head>

<body>
    <?php  
        if (isset($errors['user'])) echo '<div class="error"> '.$errors['user'].' </div>'; 
        if (isset($errors['email'])) echo '<div class="error"> '.$errors['email'].' </div>'; 
        if (isset($errors['password'])) echo '<div class="error"> '.$errors['password'].' </div>'; 
        if (isset($errors['password2'])) echo '<div class="error"> '.$errors['password2'].' </div>'; 
        if (isset($errors['incorrect'])) echo '<div class="error"> '.$errors['incorrect'].' </div>'; 
    ?>
    <a href="/index.php">Volver</a>
    
</body>
</html>