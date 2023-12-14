<?php
/**
 *	@author Luis Anthony Toapanta Bolaños
 *  @version 1.0
 */

	echo '<header>';
		echo '<ul>';
			echo '<li><a href="/index.php/?name=rick">Rick</a></li>';
			echo '<li><a href="/index.php/?name=morty">Morty</a></li>';
		echo '</ul>';
		echo '<form action="/index.php" method="get">';
			echo '<label></label>';
			echo '<input type="text" name="nameSearch">';
			echo '<input type="submit" value="Buscar">';
		echo '</form>';
	echo '</header>';
?>