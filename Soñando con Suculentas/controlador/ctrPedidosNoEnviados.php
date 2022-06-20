<?php

/* Controlador para establecer un pedido como enviado */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Si el usuario es administrador
if(isset($_SESSION["admin"])) {  

    // Llamada al modelo
    require_once("../modelo/Pedido.php");

    // Si está establecido el id del pedido, significa que ya hemos elegido el pedido a establecer como enviado
    if (isset($_POST["idPedido"])) {

        $pedido = new Pedido();
        $pedidoEnviado = $pedido->setPedidoEnviado($_POST["idPedido"]);       
        
        require_once("../vista/cambiarPedidoEnviado.php");

        if ($pedidoEnviado) {
            echo "<script>
                Swal.fire({
                    text: 'El pedido se ha establecido como enviado',
                    icon: 'success',
                    background: 'rgb(253, 253, 253)',
                    showConfirmButton: true,
                    timer: 5000,
                    customClass: {
                        popup: 'ventanaConfirm'
                    }       
                });
            </script>";

        // Si no se ha podido cambiar
        } else {
            echo "<script>
                Swal.fire({
                    text: 'No se ha podido establecer como enviado',
                    icon: 'error',
                    background: 'rgb(253, 253, 253)',
                    showConfirmButton: true,
                    timer: 5000,
                    customClass: {
                        popup: 'ventanaConfirm'
                    }       
                });
            </script>";
        }
    }

    $pedido = new Pedido();
    $pedidos = $pedido->getPedidosNoEnviados();
    require_once("../vista/cambiarPedidoEnviado.php");

} else {
    header("location:../vista/index.php");
}

?>