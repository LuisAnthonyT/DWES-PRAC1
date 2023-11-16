<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */

    function connectionBD():PDO {

      $dsn = 'mysql:host=localhost;dbname=revels';
      $user = 'revel';
      $pass = 'lever';
      $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

      try {
          //Crear y devolver el objeto PDO
          return new PDO($dsn, $user, $pass, $options);

      } catch (PDOException $e) {
          // Manejar errores de conexión
          print 'Fallo durante la conexión:' . $e->getMessage();
          return null;
        }
    }
?>