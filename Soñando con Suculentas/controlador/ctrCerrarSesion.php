<?php
/* Controlador para cerrar la sesión */

    // Borro las variables de sesión y la destruyo. Después se redirige al inicio
    session_start();
    session_unset();
    session_destroy();
    header("location:../vista/index.php");

?>