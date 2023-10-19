<?php 
    //USAR LA FUUNCIÓN imgaestring para añadir la marca de agua: LUIS ANTHONY
    $path = __DIR__ .'/img/'.$_GET['img'];
    
    $image = imagecreatefrompng($path);
   

    // Crear algunos colores
    $blanco = imagecolorallocatealpha($image, 255, 255, 255, 80);
    $negro = imagecolorallocate($image, 0, 0, 0);
  
    imagefilledrectangle($image, 0, 0, 399, 29, $blanco);
    
    //Texto a dibujar y fuente
    $texto = "Luis Anthony";
    $fuente = 'LiberationSans-Bold.ttf';

    // Añadir algo de sombra al texto
    imagettftext($image, 20, 0, 11, 21, $blanco, $fuente, $texto);

    // Añadir el texto
    imagettftext($image, 20, 0, 10, 20, $negro, $fuente, $texto);

    
    //Se indica la cabecera para enviar una imagen
    header('content-type: image/png');
    //Se envía la imagen
    imagepng($image);
    //Se liberan los recursos
    imagedestroy($image);

