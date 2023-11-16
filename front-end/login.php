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
    <link rel="stylesheet" href="styles/style.css">
    <title>Login</title>
</head>
<body>
    <?php 
        include(__DIR__. '/inc/header.inc.php');
    ?>

     <div class="bienvenida">
        <h1>Login</h1>
    </div>

    <?php 
        session_start();

        //VALIDACIONES
        if (!empty($_POST)) {
            if (empty($_POST['user'])) {
                $errors['user'] = 'El campo usuario esta vacio';
            } else {
                $user = trim($_POST['user']);
            }
            if (empty($_POST['password'])) {
                $errors['password'] = 'El campo contraseña esta vacio';
            } else {
                $password = trim($_POST['password']);
            }

            if (empty($errors)) {
                include_once(__DIR__ . '/inc/functionsCrud.php');
                $stateLogin = login($user, $password);

                if ($stateLogin === null) {
                    $errors['login'] = 'Usuario o contraseña incorrecto';
                } else {
                    $_SESSION['userId'] = $stateLogin;
                    $_SESSION['userName'] = $user;

                    unset($user, $password);
                    header("Location: /index.php");
                    exit();
                }
            }
        }
    ?>

     <form class="login" action="#" method="post" enctype="multipart/form-data">
            Usuario: <input type="text" name="user" value="<?php echo isset($user) ? $user : null ?>">
            <?php if (isset($errors['user'])) echo '<div class="error"> '.$errors['user'].' </div>'; ?>

            Contraseña: <input type="password" name="password" >
            <?php if (isset($errors['password'])) echo '<div class="error">'.$errors['password'].' </div>'; ?>
            <?php if (isset($errors['login'])) echo '<div class="error">'.$errors['login'].' </div>'; ?>

            <input type="submit" value="Entrar">
        </form>
    <?php include_once(__DIR__ . '/inc/footer.inc.php'); ?>
</body>
</html>