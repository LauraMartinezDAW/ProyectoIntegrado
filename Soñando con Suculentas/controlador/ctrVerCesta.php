<?php
/* Controlador de la cesta */

session_start();

// Si hay usuario y la cesta no está vacía
if (isset($_SESSION["usuario"])) {

    $cesta = $_SESSION["cesta"];

    if (!empty($cesta)) {
        require_once("../modelo/Producto.php");       
        
        $totalPedido = 0;

        // Calculo el total del pedido
        for ($i = 0; $i < count($cesta); $i++) {
            // La $i recorre cada producto y el índice 4 apunta al total de cada uno
            $totalPedido += $cesta[$i][5];
        }
        // Guardo el total en una variable de sesión 
        $_SESSION["totalPedido"] = $totalPedido;
        
        require_once("../vista/cesta.php");

    } else {
        require_once("ctrTienda.php");
    }
// Si no hay sesión, se lleva al index
} else {
    header("location:../index.php");
}
?>