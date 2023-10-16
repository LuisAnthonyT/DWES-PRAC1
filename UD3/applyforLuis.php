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
        //Validaciones
        // $exprUser = "/[a-zA-Z]((\.|_|-)?[a-zA-Z0-9]+){3}/";
        // $exprName = "//";
        // $exprSurnames = "//";
        // $exprDni = "//";
        // $exprStreet = "//";
        // $exprMail = "//";
        // $exprNumber = "//";
        // $exprDate = "//";
       
        //Se comprueba si los campos del form han sido enviados
        if (isset($_POST['usuario'])) {
            $errorEmpty = false;
            foreach ($_POST as $key => $value) {
                if (strlen($value) == 0) {
                    switch ($key) {
                        case 'usuario':           
                            $errorUser = "El campo usuario esta vacio";           
                            break;
                        case 'nombre':          
                            $errorName = "El campo nombre esta vacio";          
                            break;
                        case 'apellidos':        
                            $errorSurnames = "El campo apellidos esta vacio";         
                            break;
                        case 'dni':      
                            $errorDni = "El campo dni esta vacio";
                            break;
                        case 'direccion':         
                            $errorStreet = "El campo direccion esta vacio";          
                            break;
                        case 'mail':
                            $errorMail = "El campo mail esta vacio";        
                            break;
                        case 'telefono':       
                            $errorNumber = "El campo telefono esta vacio";   
                        case 'fechaNacimiento':      
                            $errorDate = "El campo fechaNacimiento  esta vacio";

                            default:
                                break;

                            }
                        }
                    }
                }
        if ($errorUser) {
            echo $errorUser;
        }
    ?>

    <h1>Oferta de trabajo</h1>
    <form action="#" method="post">
        Usuario: <input type="text" name="usuario">
        Nombre: <input type="text" name="nombre">
        Apellidos: <input type="text" name="apellidos">
        DNI: <input type="text" name="dni">
        Dirección: <input type="text" name="direccion">
        Mail: <input type="text" name="mail">
        Teléfono: <input type="text" name="telefono">
        Fecha de nacimiento: <input type="text" name="fechaNacimiento">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>