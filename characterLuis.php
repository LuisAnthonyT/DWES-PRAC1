<?php 
/**
 *	@author Luis Anthony Toapanta Bolaños
 *  @version 1
 */
    session_start();
    $languages = ['español', 'valencià', 'english'];

    if (isset($_POST['language'])) {
      if (in_array($_POST['language'], $languages)) {
        $_SESSION['language'] = $_POST['language'];
      }

    } else {
      $languagesBrowser = explode(',' , $_SERVER['HTTP_ACCEPT_LANGUAGE']);
      $languageBrow = substr($languagesBrowser[0], 0, 2);
      $_SESSION['language'] = $languageBrow;
    }
?>
<!DOCTYPE html>
<html lang="<?= isset($_SESSION['language']) ? $_SESSION['language'] : 'es'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        Elige un idioma:</br>
        <select name="language"></br>
          <?php 
            foreach($languages as $language) {
              echo '<option value="'. $language .'" '. ($language == $_SESSION['language'] ? 'selected' : '') .'>'.$language.'</option>';
            }
          ?>
        </select>
        <input type="submit" value="Cambiar idioma">
    </form>

    <?php
    if (isset($_SESSION['language'])) {
      if ($_SESSION['language'] == 'español') {  
    ?>
      <!-- ESPAÑOL -->
      <section>
        <h1>Jason Statham</h1>
        <p>Deportista olímpico del equipo británico, y a su vez, modelo y vendedor de joyería, Jason Statham fue descubierto paseando en Londres por el director Guy Ritchie, que le contrató para su primera película, 'Lock & Stock' en 1998 . Los dos se hicieron amigos, y fruto de este encuentro surgieron otras dos películas: 'Snatch, cerdos y diamantes' y 'Revolver'.Después de pasar por la ciencia ficción ('El único' y 'Fantasmas de Marte'), el actor de físico atlético, parece cómodo en la películas de acción: como demuestra en la trilogía de 'Transporter' y en las dos entregas de 'Crank: veneno en la sangre', y codeandose con otras personalidades del géro como Wesley Snipes ('Caos') o Jet Li ('El asesino'). Jason Statham también es conocido por interpretar a sendos ladrones en 'The Italian Job' (2003) y 'The Bank Job'.En 2008 rueda 'Death Race (La carrera de la muerte)',</p>
      </section>

    <?php } else if ($_SESSION['language'] == 'valencià' || $_SESSION['language'] == 'ca' ) {?>

      <!-- VALENCIANO -->
      <section>
        <h1>Jason Statham</h1>
        <p>Esportista olímpic de l'equip britànic, i al seu torn, model i venedor de joieria, Jason *Statham va ser descobert passejant a Londres pel director Guy *Ritchie, que li va contractar per a la seua primera pel·lícula, '*Lock & Estoc' en 1998 . Els dos es van fer amics, i fruit d'esta trobada van sorgir altres dues pel·lícules: '*Snatch, porcs i diamants' i 'Regirar'.Després de passar per la ciència-ficció ('L'únic' i 'Fantasmes de Mart'), l'actor de físic atlètic, sembla còmode en la pel·lícules d'acció: com demostra en la trilogia de '*Transporter' i en els dos lliuraments de '*Crank: verí en la sang', i *codeandose amb altres personalitats del *géro com Wesley *Snipes ('Caos') o Jet Li ('L'assassí'). Jason *Statham també és conegut per interpretar a sengles lladres en '*The *Italian *Job' (2003) i '*The *Bank *Job'.En 2008 roda '*Death *Race (La carrera de la mort)',</p>
      </section>

    <?php } else { ?>

     <!-- INGLÉS -->
     <section>
      <h1>Jason Statham</h1>
      <p>Olympic athlete of the British team, and at the same time, model and jewelry salesman, Jason Statham was discovered walking in London by director Guy Ritchie, who hired him for his first film, 'Lock & Stock' in 1998. The two became friends, and as a result of this encounter, two other films were made: 'Snatch, Pigs and Diamonds' and 'Revolver'. After a stint in science fiction ('The One' and 'Ghosts of Mars'), the athletic actor seems at home in action films: as demonstrated in the 'Transporter' trilogy and in the two installments of 'Crank: Venom in the Blood', and rubbing shoulders with other personalities of the genre such as Wesley Snipes ('Chaos') or Jet Li ('The Assassin'). Jason Statham is also known for playing two thieves in 'The Italian Job' (2003) and 'The Bank Job' and in 2008 he shot 'Death Race',Translated with DeepL.com (free version)</p>
     </section>
    <?php } } ?>
</body>
</html>