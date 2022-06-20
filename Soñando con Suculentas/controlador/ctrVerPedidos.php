<?php

/* Controlador para establecer un pedido como enviado */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Llamada al modelo
require_once("../modelo/Pedido.php");

$pedido = new Pedido();


// Si el usuario es administrador
    if (isset($_SESSION["admin"])) {  
        $pedidos = $pedido->getPedidos();
        require_once("../vista/eliminarPedido.php");

    } else if (isset($_SESSION["email"])) {
        $pedidos = $pedido->getPedidosPorUsuario($_SESSION["email"]);

        require_once("../vista/verPedido.php");

    } else {
        header("location:../vista/index.php");
    }

?>