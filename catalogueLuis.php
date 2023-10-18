<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $dir = __DIR__ . "/img";
   
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                echo "<img src='watermark.php?img=$file' alt='$file'>";
            }
            closedir($dh);
        }
    } 
    ?>
</body>
</html>