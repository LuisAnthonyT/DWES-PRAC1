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
    <title>Document</title>
</head>
<body>
    <h3>Introduce los datos</h3>
    <form action="processLuis.php" method="get">
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