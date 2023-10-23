<?php 
    $edad = mktime(0, 0, 0, mt_rand(1,12), mt_rand(1, 31), mt_rand(1999, 2005));
    echo $edad;
    echo "</br>";

    function getDateBirthday ($birthday) {
        return $dateBirthday = date("d-m-Y", $birthday);
    }

    $fecha = getDateBirthday($edad);
    echo $fecha;
    echo "</br>";

    $today = new DateTime();
    echo $today->format('Y-m-d');

    $fechaNacimiento = DateTime::createFromFormat('d-m-Y', $fecha);

    // Calcular la edad
    $interval = $fechaNacimiento->diff($today);
    $age = $interval->y;

    echo "Edad: " . $age;
?>