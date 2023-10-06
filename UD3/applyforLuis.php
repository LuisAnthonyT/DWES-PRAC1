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
        $errorEmpty = false;
        
        //Se comprube si los campos del form han sido enviados
        if (isset($_POST['usuario'])) {
            $errorEmpty = false;
            foreach ($_POST as $key => $value) {
                if (strlen($value) == 0) {
                    $errorEmpty = true;
                    break; // Si se encuentra un campo vacío, salir del bucle
                } 
            }
        }

        if ($errorEmpty) {
            echo"<div class='error'>";
            echo "<p> Hay campos vacios </p>";
            echo "</div>";
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