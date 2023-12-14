<?php
/**
 *	@author Luis Anthony Toapanta Bolaños
 *  @version 1.0
 */
	if (isset($_GET['name']) && !empty($_GET['name'])) {
		if ($_GET['name'] == 'rick') {
				$data = file_get_contents("https://rickandmortyapi.com/api/character/?name=rick&page=2");
				$data = json_decode($data);

		} else if ($_GET['name'] == 'morty') {
			$data = file_get_contents("https://rickandmortyapi.com/api/character/?name=morty&page=2");
			$data = json_decode($data);
		} 
	}

	if (isset($_GET['nameSearch']) && !empty($_GET['nameSearch'])) {
		$searchTerm = urlencode($_GET['nameSearch']);

		try {
			$dataSearch = file_get_contents("https://rickandmortyapi.com/api/character/?name=$searchTerm&page=2");
			$dataSearch = json_decode($data);

			if ($dataSearch === null) {
				throw new Exception("Error 404 :(");
			}

		} catch (Exception $e) {
			echo "Error" . $e->getMessage();
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/style.css">
        <title>Rick y Morty</title>
    </head>
    <body>
        <?php 
        include_once(__DIR__ . '/includes/header.inc.php');

				if (isset($data) && !empty($data)) {
					echo '<div class="container">';
							foreach ($data->results as $index => $character) {
								echo '<article>';
									echo '<img src="'.$character->image.'"></img>';
									echo '<span>' . $character->name .'</span>';
								echo '</article>';
							}
					echo '</div>';	
				} 

				if (isset($dataSearch) && !empty($dataSearch)) {
					echo '<div class="container">';
							foreach ($dataSearch->results as $index => $character) {
								echo '<article>';
									echo '<img src="'.$character->image.'"></img>';
									echo '<span>' . $character->name .'</span>';
								echo '</article>';
							}
					echo '</div>';	
				} 
    ?>
</body>
</html>