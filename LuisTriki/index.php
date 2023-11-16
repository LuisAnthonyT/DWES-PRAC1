<?php
/**
 *	Script que informa del uso de cookies en él
 * 
 *	@author 
 */

?>
<?php 
	// COOKIES ESTILOS
	if (!isset($_COOKIE['style'])) {
    	setcookie('style', 'dark', time() + 3600, httponly: true);
    	$cssStyle = 'dark'; 

	} else {
    	$cssStyle = $_COOKIE['style'];

    	if (isset($_GET['claro'])) {
        	setcookie('style', 'light', time() + 3600, httponly: true);
        	$cssStyle = 'light';
        	header('location: /index.php');
        	exit();

    	} elseif (isset($_GET['dark'])) {
        	setcookie('style', 'dark', time() + 3600, httponly: true);
        	$cssStyle = 'dark'; 
        	header('location: /index.php');
        	exit();
    	}
	}
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Triki: el monstruo de las Cookies</title>
		<link rel="stylesheet" href="css/<?=$cssStyle?>.css">
	</head>

	<body>
	<?php 
		// COOKIES ACEPTAR Y  CANCELAR
		if (isset($_GET['accept'])) {
			setcookie('accept', 'value', time()+60, httponly: true);
			header('location: /index.php');
			exit();
		}

		if (isset($_GET['cancel'])) {
			setcookie('accept', 'value', time()-1);
			header('location: /index.php');
			exit();
		}

		if (!isset($_COOKIE['accept'])) {
			echo '<div id="cookies">';
				echo 'Este sitio web utiliza cookies propias y puede que de terceros.<br>';
				echo 'Al utilizar nuestros servicios, aceptas el uso que hacemos de las cookies.<br>';
				echo '<div><a href="/index.php?accept=true">ACEPTAR</a></div>';
			echo '</div>';
		}
	?>
		<h1>Bienvenido a la web de Triki, el monstruo de las cookies</h1>
		
		<h2>Bienvenido a la web donde no se gestionan las cookies, se devoran.</h2>
		<img src="/img/triki.jpg" alt="Imagen de triki mirando una galleta">
		
		<div id="botones">
			<a href="index.php?claro=true" class="styleButton">Claro</a>
			<a href="index.php?dark=true" class="styleButton">Oscuro</a>
		</div>
		<br>

		<div><a href="/index.php?cancel=true">Borrar cookies</a></div>
	</body>
</html>