<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */

     session_start();

     
     if (isset($_GET['revelId'])) {
         include_once('../front-end/inc/functionsCrud.php');

         deleteRevelById($_GET['revelId']);
         header('location: /back-end/list.php');
         exit();
     }
     
?>