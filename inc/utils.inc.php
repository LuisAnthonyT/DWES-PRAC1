<?php
require_once(__DIR__ .'/Circuit.inc.php');
require_once(__DIR__ . '/Team.inc.php');
require_once(__DIR__ . '/Mechanic.inc.php');
require_once(__DIR__ . '/Rider.inc.php');
require_once(__DIR__ . '/GrandPrix.inc.php');


$teams[] = new Team('Honda HRC', 'Japón');
$teams[] = new Team('Yamaha', 'Japón');
$teams[] = new Team('Ducati', 'Italia');
$teams[] = new Team('Aprilia', 'Italia');

$circuits[] = new Circuit('Ricardo Tormo', 'España', 26);
$circuits[] = new Circuit('Suzuka', 'Jaón', 21);
$circuits[] = new Circuit('Assen', 'Países Bajos', 20);

function randomName(): string{
    $names = ['Juan', 'María', 'Carlos', 'Laura', 'Pedro', 'Ana', 'José', 'Sofía', 'Miguel', 'Elena', 'David', 'Carmen', 'Pablo', 'Isabel', 'Manuel', 'Lucía', 'Javier', 'Raquel', 'Daniel', 'Paula', 'Francisco', 'Martina', 'Diego', 'Valentina', 'Luis', 'Julia', 'Alejandro', 'Valeria', 'Jorge','Emma', 'Alberto', 'Marta', 'Andrés', 'Claudia', 'Joaquín', 'Antonia', 'Adrián', 'Alba', 'Rafael', 'Eva', 'Rubén', 'Lorena', 'Fernando', 'Olivia','álvaro', 'Nerea', 'Iván', 'Mireia', 'Jesús', 'Aitana', 'Mario', 'Celia'];
    return $names[rand(0, count($names)-1)];
}

function randomBirthday(): int {
    return mktime(0,0,0,rand(1,12),rand(1,31),rand(1996,2009));    
}

function randomSpeciality(): string {
    $specialities = ['Motor', 'Aerodinámica', 'Hidráulica', 'Electrónica', 'Neumáticos', 'Suspensión'];
    return $specialities[rand(0, count($specialities)-1)];
}

for($i=1; $i<100; $i++) {
    $dorsals[] = $i;
}
shuffle($dorsals);
// Uso: randomDorsal($dorsals) LA POSICIÓN DE CADA RIDER
function randomDorsal(array &$dorsals): int {
    return array_pop($dorsals);
}

//AÑADIR 2 mecánicos y 2 pilotos a cada equipo.
echo '<div class="container">';
echo "<h1>Teams</h1>";
foreach ($teams as $team) {

    //CREACIÓN DE 2 MECÁNICOS
    $mechanic1 = new Mechanic (randomName(), randomBirthday(), randomSpeciality());
    $mechanic2 = new Mechanic (randomName(), randomBirthday(), randomSpeciality());
    
    //CREACIÓN DE 2 PILOTOS
    $rider1 = new Rider (randomName(), randomBirthday(), randomDorsal($dorsals));
    $rider2 = new Rider (randomName(), randomBirthday(), randomDorsal($dorsals));

    $team ->addMechanic($mechanic1);
    $team ->addMechanic($mechanic2);
    $team ->addRider($rider1);
    $team ->addRider($rider1);

    echo $team . "</br>";
}
echo "</div>";

//CREACIÓN 3 carreras y añade a los pilotos a las carreras con la posición obtenida.
echo "<h1>Carreras</h1>";
foreach ($circuits as $circuit) {
    $grandprix[] = new GrandPrix (randomBirthday(), $circuit);
}
echo '<div class="container">';
foreach ($grandprix as $grand) {
    echo $grand;
}
echo "</div>";

