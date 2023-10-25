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
         $exprUser = "/^[a-zA-Z]((\.|_|-)?[a-zA-Z0-9]+){3}$/";
         $exprName = "/^[A-Za-z ]+$/";
         $exprSurnames = "/^[\p{L} \-']+$/u"; 
         $exprDni = "/^\d{8}[A-Z]$/";
         $exprStreet = "/^[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?)*$/";
         $exprMail = "/^[a-z0-9_\-]+(\.[_a-z0-9\-]+)*@([_a-z0-9\-]+\.)+([a-z]{2}|aero|asia|arpa|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|xxx)$/";
         $exprNumber = "/^0{0,2}([\+]?[\d]{1,3} ?)?([\(]([\d]{2,3})[)] ?)?[0-9][0-9 \-]{6,}( ?([xX]|([eE]xt[\.]?)) ?([\d]{1,5}))?$/";
         $exprDate = "/^\d{4}-\d{2}-\d{2}$/";

         $exito = false;
         
         if (!empty($_POST)) {

            if (empty($_POST['user'])) {
                $errores['user'] = "El campo usuario esta vacio";
            } else {
                if (!validarDatos($exprUser, $_POST['user'])){
                    $errores['user'] = "El usuario debe comenzar con un carácter alfanumérico, al menos 4 caracteres de longitud, puede contener números pero no comenzar con uno. También puede contener guiones bajos, puntos o guiones, pero no al comienzo o al final o tener más de uno junto";
                }
                $user = trim($_POST['user']); 
            }
            if (empty($_POST['name'])) {
                $errores['name'] = "El campo nombre esta vacio";
            } else {
                if (!validarDatos($exprName, $_POST['name'])){
                    $errores['name'] = "El nombre no es válido. Debe contener solo letras y espacios ";
                }
                $name = trim($_POST['name']); 
            }
            if (empty($_POST['surnames'])) {
                $errores['surnames'] = "El campo apellidos esta vacio";
            } else {
                if (!validarDatos($exprSurnames, $_POST['surnames'])){
                    $errores['surnames'] = "Los apellidos no son válidos. Debe contener solo letras y espacios ";
                }
                $surnames = trim($_POST['surnames']); 
            }
            if (empty($_POST['dni'])) {
                $errores['dni'] = "El campo dni esta vacio";
            } else {
                if (!validarDatos($exprDni, $_POST['dni'])){
                    $errores['dni'] = "El DNI no es válido. Debe tener 8 dígitos seguidos de una letra. ";
                }
                $dni = trim($_POST['dni']); 
            }
            if (empty($_POST['street'])) {
                $errores['street'] = "El campo dirrección esta vacio";
            } else {
                if (!validarDatos($exprStreet, $_POST['street'])){
                    $errores['street'] = "La dirrección no es válida. Debe contener letras, espacios, guiones, puntos o comas. ";
                }
                $street = trim($_POST['street']); 
            }
            if (empty($_POST['mail'])) {
                $errores['mail'] = "El campo mail esta vacio";
            } else {
                if (!validarDatos($exprMail, $_POST['mail'])){
                    $errores['mail'] = "El mail no es válido. Debe contener letras, un @ y un dominio ";
                }
                $mail = trim($_POST['mail']); 
            }
            if (empty($_POST['number'])) {
                $errores['number'] = "El campo teléfono esta vacio";
            } else {
                if (!validarDatos($exprNumber, $_POST['number'])){
                    $errores['number'] = "El teléfono no es válido. Debe contener 8 números";
                }
                $number = trim($_POST['number']); 
            }
            if (empty($_POST['date'])) {
                $errores['date'] = "El campo fecha de nacimiento esta vacio";
            } else {
                if (!validarDatos($exprDate, $_POST['date'])){
                    $errores['date'] = "La fecha de nacimiento no es válida. Debe tener el formato 'YYYY-MM-DD'.";
                }
                $date = trim($_POST['date']); 
            }
            //VALIDACIONES ARCHIVO PDF
            if (!empty($_FILES['curriculum'])) {
                            
                if ($_FILES['curriculum']['error'] !== UPLOAD_ERR_OK) {
                    switch ($_FILES['curriculum']['error']) {
                        case UPLOAD_ERR_INI_SIZE:
                        case UPLOAD_ERR_FORM_SIZE: $errores['curriculum'] = 'El fichero es demasiado grande.';
                                               break;
                        case UPLOAD_ERR_PARTIAL: $errores['curriculum'] = 'El fichero no se ha podido subir entero. ';
                                                break;
                        case UPLOAD_ERR_NO_FILE: $errores['curriculum'] = 'No se ha podido subir el fichero. ';
                                                break;
                        default:                 $errores['curriculum'] = 'Error indeterminado. ';
                    
                    }
                } else if ($_FILES['curriculum']['type'] != 'application/pdf') {
                    $errores['curriculum'] = "Error: No se trata de un fichero PDF.";
                } else {
                    if (empty($errores)) {
                        //Si no hay error con el tipo, se comprueba si el archivo es uno recién subido al servidor
                        if (is_uploaded_file($_FILES['curriculum']['tmp_name']) === true) {
                            $nameFile = $dni . $name . $surnames;
                            $nuevaRuta = "./cvs/". $nameFile . ".pdf";
                            if (is_file($nuevaRuta) === true) {
                                $errores['curriculum'] =  'Error: Ya existe un archivo con el mismo nombre.';
                            } else {
                                if (!move_uploaded_file($_FILES['curriculum']['tmp_name'], $nuevaRuta)) {
                                    $errores['curriculum'] = 'Error: No se puede mover el fichero a su destino';
                                }
                            }
                        }
                    }
                    $errores['curriculum'] = "Error: Hay campos vacios o sin cumplir el formato";
                }
             } //else {
            //     $errores['curriculum'] = "Debes seleccionar un archivo.pdf";
            // }

            //VALIDACIONES DNI.PNG

            if (!empty($_FILES['imgdni'])) {
                            
                if ($_FILES['imgdni']['error'] !== UPLOAD_ERR_OK) {
                    switch ($_FILES['imgdni']['error']) {
                        case UPLOAD_ERR_INI_SIZE:
                        case UPLOAD_ERR_FORM_SIZE: $errores['imgdni'] = 'La imagen es demasiado grande.';
                                               break;
                        case UPLOAD_ERR_PARTIAL: $errores['imgdni'] = 'La imagen no se ha podido subir entero. ';
                                                break;
                        case UPLOAD_ERR_NO_FILE: $errores['imgdni'] = 'No se ha podido subir la imagen. ';
                                                break;
                        default:                 $errores['imgdni'] = 'Error indeterminado. ';
                    
                    }
                } else if ($_FILES['imgdni']['type'] != 'image/png') {
                    $errores['imgdni'] = "Error: No se trata de una imagen png.";
                } else {
                    if (empty($errores)) {
                        //Si no hay error con el tipo, se comprueba si el archivo es uno recién subido al servidor
                        if (is_uploaded_file($_FILES['imgdni']['tmp_name']) === true) {
                            $nameImg = $dni;
                            $nuevaRuta = "./candidates/". $nameImg . ".png";
                            if (is_file($nuevaRuta) === true) {
                                $errores['imgdni'] =  'Error: Ya existe un archivo con el mismo nombre.';
                            } else {
                                if (!move_uploaded_file($_FILES['imgdni']['tmp_name'], $nuevaRuta)) {
                                    $errores['imgdni'] = 'Error: No se puede mover el fichero a su destino';
                                }
                            }
                        }
                    }
                    $errores['imgdni'] = "Error: Hay campos vacios o sin cumplir el formato";
                }
            } //else {
                //$errores['imgdni'] = "Debes seleccionar un imagen.png";
            //}
            
           
            //MENSAJES DE ERRORES
            if (empty($errores)) {
                $exito = true;
            }
        }
    ?>
    <?php  if ($exito): ?>
        <div class='correct'>
            <span> Datos Correctos </span>
        </div>
    <?php else: ?>    

    <h1>Oferta de trabajo</h1>
        <form action="#" method="post" enctype="multipart/form-data">
            Usuario: <input type="text" name="user" value="<?php echo isset($user) ? $user : null  ?>">
            <?php if (isset($errores['user'])) echo "<div class='error'>" . $errores['user'] . "</div>"; ?>

            Nombre: <input type="text" name="name" value="<?php echo isset($name) ? $name : null  ?>">
            <?php if (isset($errores['name'])) echo "<div class='error'>" . $errores['name'] . "</div>"; ?>

            Apellidos: <input type="text" name="surnames" value="<?php echo isset($surnames) ? $surnames : null  ?>">
            <?php if (isset($errores['surnames'])) echo "<div class='error'>" . $errores['surnames'] . "</div>"; ?>

            DNI: <input type="text" name="dni" value="<?php echo isset($dni) ? $dni : null  ?>">
            <?php if (isset($errores['dni'])) echo "<div class='error'>" . $errores['dni'] . "</div>"; ?>

            Dirección: <input type="text" name="street" value="<?php echo isset($street) ? $street : null  ?>">
            <?php if (isset($errores['street'])) echo "<div class='error'>" . $errores['street'] . "</div>"; ?>

            Mail: <input type="text" name="mail" value="<?php echo isset($mail) ? $mail : null  ?>">
            <?php if (isset($errores['mail'])) echo "<div class='error'>" . $errores['mail'] . "</div>"; ?>

            Teléfono: <input type="text" name="number" value="<?php echo isset($number) ? $number : null  ?>">
            <?php if (isset($errores['number'])) echo "<div class='error'>" . $errores['number'] . "</div>"; ?>

            Fecha de nacimiento: <input type="text" name="date" value="<?php echo isset($date) ? $date : null  ?>">
            <?php if (isset($errores['date'])) echo "<div class='error'>" . $errores['date'] . "</div>"; ?>

            Sube tu curriculum (pdf): <input type="file" name="curriculum"></br>
            <?php if (isset($errores['curriculum'])) echo "<div class='error'>" . $errores['curriculum'] . "</div>"; ?>

            Selecciona tu foto de perfil (png):
            <input type="file" name="imgdni">
            <?php if (isset($errores['imgdni'])) echo "<div class='error'>" . $errores['imgdni'] . "</div>"; ?>

            <input type="submit" value="Enviar">
        </form>
    <?php endif; ?>
</body>
</html>