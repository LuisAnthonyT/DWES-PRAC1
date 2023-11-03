<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */
?>
 <!DOCTYPE html>
 <html lang="es">
<link rel="stylesheet" href="/styles/style2.css">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milotos MotoGP</title>
 </head>
 <body>
    <?php 
   include_once(__DIR__ . '/inc/utils.inc.php');
   

   //AÑADIR 2 mecánicos y 2 pilotos a cada equipo.
   echo "<h1>Teams</h1>";
   foreach ($teams as $team) {
   echo '<div class="container">';

    //CREACIÓN DE 2 MECÁNICOS
    $mechanic1 = new Mechanic (randomName(), randomBirthday(), randomSpeciality());
    $mechanic2 = new Mechanic (randomName(), randomBirthday(), randomSpeciality());
    
    //CREACIÓN DE 2 PILOTOS
    $rider1 = new Rider (randomName(), randomBirthday(), randomDorsal($dorsals));
    $rider2 = new Rider (randomName(), randomBirthday(), randomDorsal($dorsals));

    $team ->addMechanic($mechanic1);
    $team ->addMechanic($mechanic2);
    $team ->addRider($rider1);
    $team ->addRider($rider2);

    echo $team ;
    echo "</div>";
   }

    //CREACIÓN 3 carreras
    foreach ($circuits as $circuit) {
    $grandprix[] = new GrandPrix (randomBirthday(), $circuit);
    }

    //INSERTAR LOS PILOTOS A LAS CARRERAS CON LA POSICIÓN OBTENIDA
   //  foreach ($grandprix as $grand) {
   //     $grand->addRider($rider1->__get('number'), $rider1);
   //     $grand->addRider($rider2->__get('number'), $rider2);
   //    }

    foreach ($teams as $team) {
    $riders = $team->riders;
    foreach ($grandprix as $grand) {
        foreach ($riders as $rider) {
           $grand->addRider($rider->__get('number'), $rider);
         }
      }
   }

    //RESULTADOS DE LAS 3 CARRERAS
    echo "<h1>Resultados</h1>";
    foreach ($grandprix as $grand) {
      echo '<div class="container">';
      echo $grand->results();
      echo "</div>";

    }
   
    ?>  
 </body>
 </html>
