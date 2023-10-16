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
    <meta http-equiv="expires" content = "Sat, 07 feb 2016 00:00:00 GMT">
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
                $errores['user'] = "El campo usuario esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['user'])){
                    $errores['user'] = "El usuario no es válido. Debe contener solo letras y espacios ";
                }
                $user = trim($_POST['user']); 
            }
            if (empty($_POST['name'])) {
                $errores['name'] = "El campo nombre esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['name'])){
                    $errores['name'] = "El nombre no es válido. Debe contener solo letras y espacios ";
                }
                $name = trim($_POST['name']); 
            }
            if (empty($_POST['surnames'])) {
                $errores['surnames'] = "El campo apellidos esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['surnames'])){
                    $errores['surnames'] = "Los apellidos no son válidos. Debe contener solo letras y espacios ";
                }
                $surnames = trim($_POST['surnames']); 
            }
            if (empty($_POST['dni'])) {
                $errores['dni'] = "El campo dni esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['dni'])){
                    $errores['dni'] = "El DNI no es válido. Debe tener 8 dígitos seguidos de una letra. ";
                }
                $dni = trim($_POST['dni']); 
            }
            if (empty($_POST['street'])) {
                $errores['street'] = "El campo dirrección esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['street'])){
                    $errores['street'] = "La dirrección no es válida. Debe contener letras, espacios, guiones, puntos o comas. ";
                }
                $street = trim($_POST['street']); 
            }
            if (empty($_POST['mail'])) {
                $errores['mail'] = "El campo mail esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['mail'])){
                    $errores['mail'] = "El mail no es válido. Debe contener letras, un @ y un dominio ";
                }
                $mail = trim($_POST['mail']); 
            }
            if (empty($_POST['number'])) {
                $errores['number'] = "El campo teléfono esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['number'])){
                    $errores['number'] = "El teléfono no es válido. Debe contener 8 números";
                }
                $number = trim($_POST['number']); 
            }
            if (empty($_POST['date'])) {
                $errores['date'] = "El campo fecha de nacimiento esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['date'])){
                    $errores['date'] = "La fecha de nacimiento no es válida. Debe tener el formato 'YYYY-MM-DD'.";
                }
                $date = trim($_POST['date']); 
            }

            //MENSAJES DE ERRORES
            if (empty($errores)) {
                echo"<div class='correct'>";
                    echo "<span> Datos Correctos </span>";
                echo "</div>"; 
            }
        }
    ?>

    <h1>Oferta de trabajo</h1>
    <form action="#" method="post">
        Usuario: <input type="text" name="user">
        <?php if (isset($errores['user'])) echo "<div class='error'>" . $errores['user'] . "</div>"; ?>

        Nombre: <input type="text" name="name">
        <?php if (isset($errores['name'])) echo "<div class='error'>" . $errores['name'] . "</div>"; ?>

        Apellidos: <input type="text" name="surnames">
        <?php if (isset($errores['surnames'])) echo "<div class='error'>" . $errores['surnames'] . "</div>"; ?>

        DNI: <input type="text" name="dni">
        <?php if (isset($errores['dni'])) echo "<div class='error'>" . $errores['dni'] . "</div>"; ?>

        Dirección: <input type="text" name="street">
        <?php if (isset($errores['street'])) echo "<div class='error'>" . $errores['street'] . "</div>"; ?>

        Mail: <input type="text" name="mail">
        <?php if (isset($errores['mail'])) echo "<div class='error'>" . $errores['mail'] . "</div>"; ?>

        Teléfono: <input type="text" name="number">
        <?php if (isset($errores['number'])) echo "<div class='error'>" . $errores['number'] . "</div>"; ?>

        Fecha de nacimiento: <input type="text" name="date">
        <?php if (isset($errores['date'])) echo "<div class='error'>" . $errores['date'] . "</div>"; ?>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
