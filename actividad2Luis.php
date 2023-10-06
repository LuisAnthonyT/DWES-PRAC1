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
        

        //

        if (isset($_POST['codigo'])){
            $errorEmpty = false;
            foreach ($_POST as $key => $value) {
                if (strlen($value) == 0) {
                    $errorEmpty = true;
                    break; // Si se encuentra un campo vacío, salir del bucle
                }
                else {
                    $value = trim($value);
        
                    switch ($key) {
                        case 'codigo':
                            if (!preg_match($exprCode, $value)) {
                                $errorCode = "El código debe tener una letra seguida de un guion seguido de 5 dígitos.";
                            }
                            break;
                        case 'nombre':
                            if (!preg_match($exprName, $value)) {
                                $errorName = "El nombre debe contener entre 3 y 20 letras.";
                            }
                            break;
                        case 'precio':
                            if (!preg_match($exprPrice, $value)) {
                                $errorPrice = "El precio debe ser un número válido.";
                            }
                            break;
                        case 'descripcion':
                            if (!preg_match($exprDescr, $value)) {
                                $errorDescription = "La descripción debe tener al menos 50 caracteres alfanuméricos.";
                            }
                            break;
                        case 'fabricante':
                            if (!preg_match($exprFabri, $value)) {
                                $errorFabri = "El fabricante debe tener entre 10 y 20 caracteres alfanuméricos.";
                            }
                            break;
                        case 'fechaAdquisicion':
                            if (!preg_match($exprDate, $value)) {
                                $errorDate = "La fecha de adquisición debe tener el formato dd/mm/yyyy.";
                            }
                            break;
                        default:
                            break;
                    }
                }
                
                }
            }


            echo "<h2>Introduce los datos</h2>";

            if($errorEmpty) {
                echo "<h3> Hay campos incompletos</h3>";
            }
     
            if (isset($errorCode)){ 
                echo "$errorCode  </br>";
            }
           
            if (isset($errorName)){
                echo "$errorName </br>";
            } 
            if (isset($errorPrice)){
                 echo "$errorPrice </br>";
            } 
            if (isset($errorDescription)){ 
                echo "$errorDescription </br>";
            } 
            if (isset($errorFabri)) {
                echo "$errorFabri </br>";
            } 
            if (isset($errorDate)){
                 echo "$errorDate </br>";
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