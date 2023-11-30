<?php 
/**
 *	Script que implementa un carrito de la compra con variables de sesión
 * 
 *	@author Luis Anthony Toapanta Bolaños
 */

 session_start();
 
  //IDIOMAS
  $lan = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'es';
  require_once(__DIR__ .'/includes/lang/'.$lan.'.inc.php');

  //
 require_once('includes/header.inc.php');
 include_once(__DIR__ . '/includes/functionsCrud.php');

 echo $lan;
 

 $products = getAllProductsSales();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <section class="productos">
    <?php 
        foreach ($products as $product) {
            echo '<article class="producto">';
					echo '<h2>'. $product['name'] .'</h2>';
					echo '<span>('. $product['category'] .')</span>';
					echo '<img src="/img/products/'. $product['image'] .'" alt="'. $product['name'] .'" class="imgProducto"><br>';
					echo '<span>'. $product['price'] .' €</span><br>';
				echo '</article>';
        }
    ?>
    </section>
</body>
</html>