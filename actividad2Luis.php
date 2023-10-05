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
    <title>Document</title>
</head>
<body>

    <?php 
        //Si llegan datos se validan
        
        $exprCode = "/^[A-Za-z]-\d{5}$/";
        $exprName = "/^[A-Za-z]{3,20}$/";
        $exprPrice = "/^\d+(\.\d{1,2})?$/";
        $exprDescr = "/^[a-zA-Z0-9\s]{50,}$/";
        $exprFabri = "/^[a-zA-Z0-9]{10,20}$/";
        $exprDate = "/^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/\d{4}$/";

        if (isset($_POST['codigo'])){

            if (strlen($_POST['codigo']) > 0){
                $_POST['codigo'] = trim($_POST['codigo']);

                if (!preg_match($exprCode, $_POST['codigo'])) {
                    $errorCode = "El código debe tener una letra seguida de un guion seguido de 5 dígitos";
                }
            }
            else {
                $errorCodeEmpty = "El campo código esta vacio";
            }

        }

        if (isset($_POST['nombre'])){
            if( strlen($_POST['nombre']) > 0){
                $_POST['nombre'] = trim($_POST['nombre']);

                if (!preg_match($exprName, $_POST['nombre'])) {
                    $errorName = "El nombre debe tener solo letras (mínimo 3 y máximo 20)";
                }
            } else {
                $errorNameEmpty = "El campo name esta vacio";

            }
        }

        if (isset($_POST['precio'])) {
            if (strlen($_POST['precio']) > 0){
                $_POST['precio'] = trim($_POST['precio']);

                if (!preg_match($exprPrice, $_POST['precio'])) {
                    $errorPrice = "El precio deber ser decimal";
                }
            } else {
                $errorPriceEmpty = "El campo precio esta vacio";

            }
        
        }

        if (isset($_POST['descripcion'])){
            if(strlen($_POST['descripcion']) > 0){
                $_POST['descripcion'] =  trim($_POST['descripcion']);

                if (!preg_match($exprDescr, $_POST['descripcion'])) {
                    $errorDescription = "La descripción debe ser alfanumérico (mínimo 50 letras)";
                }
            } else {
                $errorDesEmpty = "El campo descripcion esta vacio";

            }
           
        }

        if (isset($_POST['fabricante'])){
            if(strlen($_POST['fabricante']) > 0){
                $_POST['fabricante'] = trim($_POST['fabricante']);

                if (!preg_match($exprFabri, $_POST['fabricante'])) {
                    $errorFabri = "El fabricante deber ser alfanumérico (entre 10 y 20 letras).";
                }
            } else {
                $errorFabEmpty = "El campo fabricante esta vacio";

            }
           
        }

        if (isset($_POST['fechaAdquisicion'])){
            if(strlen($_POST['fechaAdquisicion']) > 0){
                $_POST['fechaAdquisicion'] = trim($_POST['fechaAdquisicion']);
            
                if (!preg_match($exprDate, $_POST['fechaAdquisicion'])) {
                    $errorDate = "La fecha debe tener un formato válido";
                }
            } else {
                $errorAdEmpty = "El campo fecha de adquisicion esta vacio";

            }
        }
    ?>

    <h2>Introduce los datos</h2>
        <?php 
            if (isset($errorCode)){ 
                echo "$errorCode  </br>";
            }
            else {
                echo "$errorCodeEmpty</br>";
            }

            if (isset($errorName)){
                echo "$errorName </br>";
            } else {
                echo "$errorNameEmpty</br>";
            }
            if (isset($errorPrice)){
                 echo "$errorPrice </br>";
            } else {
                echo "$errorPriceEmpty </br>";
            }
            if (isset($errorDescription)){ 
                echo "$errorDescription </br>";
            } else {
                echo "$errorDesEmpty </br>";
            }
            if (isset($errorFabri)) {
                echo "$errorFabri </br>";
            } else {
                echo "$errorFabEmpty </br>";
                
            }
            if (isset($errorDate)){
                 echo "$errorDate </br>";
            } else {
                echo "$errorAdEmpty </br>";

            }
        ?>
        <hr>
    <form action="#" method="post">

        Código: <input type="text" name="codigo"></br>

        Nombre: <input type="text" name="nombre"></br>

        Precio: <input type="text" name="precio"></br>

        Descripción: <input type="text" name="descripcion"></br>

        Fabricante: <input type="text" name="fabricante"></br>

        Fecha de Adquisición: <input type="text" name="fechaAdquisicion"></br>
        <input type="submit" value="Enviar">
            
    </form>
    
</body>
</html>