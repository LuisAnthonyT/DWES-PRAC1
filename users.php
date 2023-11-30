<?php 
/**
 *	Script que implementa un carrito de la compra con variables de sesión
 * 
 *	@author Luis Anthony Toapanta Bolaños
 */
 session_start();
 require_once('includes/header.inc.php');
 include_once(__DIR__ . '/includes/functionsCrud.php');
 $users = getAllUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/style.css">
    <title>Users</title>
</head>
<body>
    <section class="productos">
    <?php 
        foreach ($users as $user) {
            echo '<article class="producto">';
                echo '<h2>'. $user['user'] .'</h2>';
                echo '<span>'. $user['email'] .'</span></br>';
            echo '<span>Rol: '. $user['rol'] .'</span>';
            echo '</article>';
        }
    ?>
    </section>
</body>
</html>