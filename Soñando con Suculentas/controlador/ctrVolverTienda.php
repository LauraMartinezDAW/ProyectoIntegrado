<?php
/* Controlador de la cesta */

session_start();

// Si hay usuario y la cesta no está vacía
if (isset($_SESSION["usuario"])) {

    $cesta = $_SESSION["cesta"];

    if (!empty($cesta)) {
        // Reinicio la cesta de la compra y los stocks originales
        $_SESSION["cesta"] = array();
        $_SESSION["stock"] = array();
        unset($_SESSION["compraFinalizada"]);
        
        header("location:ctrTienda.php");
        
    } else {
        header("location:ctrTienda.php");
    }

// Si no hay sesión, se lleva al index
} else {
    header("location:../index.php");
}

?>