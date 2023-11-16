<?php 
    /**
     * @autor Luis Anthony Toapanta Bolaños
     * @version 1
     */
?>
<?php
    //Expresiones para validar REGISTRO
    $exprName = "/^[A-Za-z]+$/";
    $exprMail = "/^[a-z0-9_\-]+(\.[_a-z0-9\-]+)*@([_a-z0-9\-]+\.)+([a-z]{2}|aero|asia|arpa|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|xxx)$/";
    
    //Si el array de errores esta vacío, significa que todos los datos están bien
    //Devuelve un error de campo vacío o de validación
    function validarDatos ( string $expr, string $dato) :bool {
        if (!preg_match($expr, $dato)) {
            return false;
        }
            return true;
    }
?>