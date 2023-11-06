<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */
?>
<?php 
   
//ESTABLECEMOS LA CONEXIÓN
$dsn = 'mysql:host=localhost;dbname=discografia';
$user = 'vetustamorla';
$pass = '15151';
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try {
    $connection = new PDO($dsn, $user, $pass, $options);  
} catch (PDOException $e) {
    print 'Fallo durante la conexión:' . $e->getMessage();
}

?>

