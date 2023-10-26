<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/userStyle.css">
    <title>Document</title>
</head>
<body>
<?php 

    require_once(__DIR__.'/users.inc.php');

    foreach ($users as $user) {
        echo $user;
       
    }
?>
</body>
</html>