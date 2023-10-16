<?php
    //Si el array de errores esta vacío, significa que todos los datos están bien
    //Devuelve un error de campo vacío o de validación
    function validarDatos ( string $expr, string $dato) :bool {
        if (!preg_match($expr, $dato)) {
            return false;
        }
            return true;
    }
?>