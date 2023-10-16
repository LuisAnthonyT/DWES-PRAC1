<?php 
/**
     * @author Luis Anthony Toapanta Bolaños
     * @version 1
     */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Oferta de trabajo</title>
</head>
<body>
    <?php 
        include_once('inc/functions.inc.php');

         //Expresiones para validar
         $exprUser = "/^[A-Za-z ]+$/";
         $exprName = "/^[A-Za-z ]+$/";
         $exprSurnames = "/^[\p{L} \-']+$/u"; 
         $exprDni = "/^\d{8}[A-Z]$/";
         $exprStreet = "/^[A-Za-z0-9 ,.-]+$/";
         $exprMail = "/^\S+@\S+\.\S+$/";
         $exprNumber = "/^\d{9}$/";
         $exprDate = "/^\d{4}-\d{2}-\d{2}$/";
         
         if (!empty($_POST)) {

            if (empty($_POST['user'])) {
                $errores[] = "El campo usuario esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['user'])){
                    $errores[] = "El usuario no es válido. Debe contener solo letras y espacios ";
                }
                $user = trim($_POST['user']); 
            }
            if (empty($_POST['name'])) {
                $errores[] = "El campo nombre esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['name'])){
                    $errores[] = "El nombre no es válido. Debe contener solo letras y espacios ";
                }
                $name = trim($_POST['name']); 
            }
            if (empty($_POST['surnames'])) {
                $errores[] = "El campo apellidos esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['surnames'])){
                    $errores[] = "Los apellidos no son válidos. Debe contener solo letras y espacios ";
                }
                $surnames = trim($_POST['surnames']); 
            }
            if (empty($_POST['dni'])) {
                $errores[] = "El campo dni esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['dni'])){
                    $errores[] = "El DNI no es válido. Debe tener 8 dígitos seguidos de una letra. ";
                }
                $dni = trim($_POST['dni']); 
            }
            if (empty($_POST['street'])) {
                $errores[] = "El campo dirrección esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['street'])){
                    $errores[] = "La dirrección no es válida. Debe contener letras, espacios, guiones, puntos o comas. ";
                }
                $street = trim($_POST['street']); 
            }
            if (empty($_POST['mail'])) {
                $errores[] = "El campo mail esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['mail'])){
                    $errores[] = "El mail no es válido. Debe contener letras, un @ y un dominio ";
                }
                $mail = trim($_POST['mail']); 
            }
            if (empty($_POST['number'])) {
                $errores[] = "El campo teléfono esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['number'])){
                    $errores[] = "El teléfono no es válido. Debe contener 8 números";
                }
                $number = trim($_POST['number']); 
            }
            if (empty($_POST['date'])) {
                $errores[] = "El campo fecha de nacimiento esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['date'])){
                    $errores[] = "La fecha de nacimiento no es válida. Debe tener el formato 'YYYY-MM-DD'.";
                }
                $date = trim($_POST['date']); 
            }
            //MENSAJES DE ERRORES
            if (empty($errores)) {
                echo"<div class='correct'>";
                    echo "<span> Datos Correctos </span>";
                echo "</div>";

            } else {
                echo"<div class='error'>";
                    foreach ($errores as $error) {
                        echo "<span> $error </span></br>";
                    }
                echo "</div>";
            }        
        }
    ?>

    <h1>Oferta de trabajo</h1>
    <form action="#" method="post">
        Usuario: <input type="text" name="user" value="<?php echo isset($user) ? $user : '' ?> ">
        Nombre: <input type="text" name="name" value="<?php echo isset($name) ? $name : '' ?> ">
        Apellidos: <input type="text" name="surnames" value="<?php echo isset($surnames) ? $surnames : '' ?> ">
        DNI: <input type="text" name="dni" value="<?php echo isset($dni) ? $dni : '' ?> ">
        Dirección: <input type="text" name="street" value="<?php echo isset($street) ? $street : '' ?> ">
        Mail: <input type="text" name="mail" value="<?php echo isset($mail) ? $mail : '' ?> ">
        Teléfono: <input type="text" name="number" value="<?php echo isset($number) ? $number : '' ?> ">
        Fecha de nacimiento: <input type="text" name="date" value="<?php echo isset($date) ? $date : '' ?> ">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
