<?php 
function getDateBirthday ($date) {
    $mesesEnEspanol = [
        'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'
    ];

    $fecha = getdate($date);
    return $fecha['mday'] . ' de ' . $mesesEnEspanol[$fecha['mon'] - 1] . ' de ' . $fecha['year'];
}

?>