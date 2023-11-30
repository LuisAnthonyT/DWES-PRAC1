<?php
/**
 *	Script que implementa un carrito de la compra con variables de sesión
 * 
 *	@author Álex Torres
 */
session_start();

if (!isset($_SESSION['rol'])) {
	$_SESSION['rol'] = 'invitado';
}

if(isset($_GET['add']) || isset($_GET['subtract']) || isset($_GET['remove'])) {
	if(isset($_GET['add']) && $_GET['add']!='') {
		if(!isset($_SESSION['basket'][$_GET['add']]))
			$_SESSION['basket'][$_GET['add']] = 1;
		else
			$_SESSION['basket'][$_GET['add']] += 1;
	}
	if(isset($_GET['subtract']) && $_GET['subtract']!='' && isset($_SESSION['basket'][$_GET['subtract']])) {
		$_SESSION['basket'][$_GET['subtract']] -= 1;
		if($_SESSION['basket'][$_GET['subtract']]<=0)
			unset($_SESSION['basket'][$_GET['subtract']]);
	}
	if(isset($_GET['remove']) && $_GET['remove']!='' && isset($_SESSION['basket'][$_GET['remove']])) {
		unset($_SESSION['basket'][$_GET['remove']]);
	}

	//header('location: /');
}
//IDIOMAS
if (isset($_COOKIE['language'])) {
	require_once(__DIR__ . '/includes/lang/'.$_COOKIE['language'].'.inc.php');
}

?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?$message['head.title']?></title>
		<link rel="stylesheet" href="/css/style.css">
	</head>
	<body>
		<?php
			require_once('includes/header.inc.php');

			if ($_SESSION['rol'] == 'invitado') {
		?>
		<!-- USUARIO NO LOGUEADO -->
		<form action="signup.php" method="post">
    <?= $message['index.form.user']?><input type="text" name="user" value=""></br>
		<?= $message['index.form.mail']?><input type="text" name="email" value=""></br>
    <?= $message['index.form.password']?><input type="password" name="password" value=""></br>
		<?= $message['index.form.password2']?><input type="password" name="password2" value=""></br>

			<input type="submit" value="<?= $message['index.form.submit']?>">
		</form>
		<a href="/login.php"><?= $message['index.login']?></a></br>
		<a href="/sales.php"><img  class="sales" src="/img/sales.png" alt="sales"></a>
		<?php 
			} else if ($_SESSION['rol'] == 'customer' || $_SESSION['rol'] == 'admin' ) {
		?>
		<!-- USUSARIO LOGUEADO -->
		<div id="carrito">
			<?php
			if(!isset($_SESSION['basket']))
				$products = 0;
			else
				$products = count($_SESSION['basket']);
			echo $products;
			echo ' producto';
			if($products>1)
				echo 's';
			?>
			en el carrito.

			<a href="/basket.php" class="boton">Ver carrito</a>	
		</div>
		
		<section class="productos">
			<?php
			require_once('includes/dbconnection.inc.php');
			$connection = getDBConnection();
			$products = $connection->query('SELECT * FROM products;', PDO::FETCH_OBJ);
			
			foreach($products as $product) {
				echo '<article class="producto">';
					echo '<h2>'. $product->name .'</h2>';
					echo '<span>('. $product->category .')</span>';
					echo '<img src="/img/products/'. $product->image .'" alt="'. $product->name .'" class="imgProducto"><br>';
					echo '<span>'. $product->price .' €</span><br>';
					echo '<span class="botonesCarrito">';
						echo '<a href="/add/'.$product->id .'" class="productos"><img src="/img/mas.png" alt="añadir 1"></a>';
						echo '<a href="/subtract/'.$product->id .'" class="productos"><img src="/img/menos.png" alt="quitar 1"></a>';
						echo '<a href="/remove/'.$product->id .'" class="productos"><img src="/img/papelera.png" alt="quitar todos"></a>';
					echo '</span>';
					echo '<span>Stock: '. $product->stock .'</span>';
				echo '</article>';
			}

			unset($products);
			unset($connection);
		}
			?>			
		</section>		
	</body>
</html>