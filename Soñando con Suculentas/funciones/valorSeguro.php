<?php
/* Función para asegurar un parámetro */
    function valorSeguro($cadena) {
        // Quita los espacios del principio y del final.
        $cadena = trim($cadena);
        // Quita las barras (\)
        $cadena = stripslashes($cadena);
        // Convierte los caracteres especiales de HTML a su código (& quedaría como &amp;)
        $cadena = htmlspecialchars($cadena);

        return $cadena;
    }
?>