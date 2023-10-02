<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Datos Tienda </h3>
    <table>
        
        <tr>
            <td>Código</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Descripción</td>
            <td>Fabricante</td>
            <td>Fecha de Adquisición</td>
        </tr>
        <tr>
            <td><?=$_GET['codigo']?></td>
            <td><?=$_GET['nombre']?></td>
            <td><?=$_GET['precio']?></td>
            <td><?=$_GET['descripcion']?></td>
            <td><?=$_GET['fabricante']?></td>
            <td><?=$_GET['fechaAdquisicion']?></td>
            </tr>
        
            </table>
</body>
</html>