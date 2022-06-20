<?php
    /* Controlador para eliminar a un usuario */

    session_start();

    // Si el usuario es administrador
    if(isset($_SESSION["admin"])) {  

        // Llamada al modelo
        require_once("../modelo/Pedido.php");

        // Si está establecido el id del pedido, significa que ya hemos elegido el pedido a eliminar
        if (isset($_POST["idPedido"])) {
            $pedido = new Pedido();
            $eliminado = $pedido->eliminarPedido($_POST["idPedido"]);       
        
            require_once("../controlador/ctrVerPedidos.php");

            if ($eliminado) {
                echo "<script>
                    Swal.fire({
                        text: 'El pedido se ha eliminado',
                        icon: 'success',
                        background: 'rgb(253, 253, 253)',
                        showConfirmButton: true,
                        timer: 5000,
                        customClass: {
                            popup: 'ventanaConfirm'
                        }       
                    });
                </script>";

            // Si no se ha podido eliminar 
            } else {
                echo "<script>
                    Swal.fire({
                        text: 'No se ha podido eliminar el pedido',
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
        $pedidos = $pedido->getPedidos(); 
        require_once("../controlador/ctrVerPedidos.php");

    } else {
        header("location:../vista/index.php");
    }
?>