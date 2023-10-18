<?php 
    
    
    $watermark = imagecreatefrompng('watermark.png');
    $watermark = imagescale($watermark, 50);
    // Se indica el modo de fusión para el alpha
    imagealphablending($watermark ,false);
    imagesavealpha($watermark, true);
    // Se obtinene las dimensiones de la imagen marca de agua
    $watermarkWidth = imagesx($watermark);
    $watermarkHeight= imagesy($watermark);
    //Se aplica un filtro a la marca para cambiarle el tono y la opacidad
    imagefilter($watermark, IMG_FILTER_COLORIZE, 0, 0, 0, 60);
    //Se carga la imagen sobre la que se mostrará la marca de agua y se obtienen sus dimensiones
    $image = imagecreatefromjpeg($GET['path']);
    $imageWidth = imagesx($image);
    $imageHeight = imagesy($image);
    //Se añade la marca de agua a la imagen
    imagecopy($image, $watermark, $watermarkWidth, $watermarkHeight, 0, 0, $imageWidth, $imageHeight);
    //Se indica la cabecera para enviar una imagen
    header('content-type: image/png');
    //Se envía la imagen
    imagepng($image);
    //Se liberan los recursos
    imagedestroy($image);
    imagedestroy($watermark);

?>