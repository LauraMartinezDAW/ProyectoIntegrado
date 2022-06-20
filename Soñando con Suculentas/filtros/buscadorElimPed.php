<?php

    // Llamada al modelo.
    require_once("../modelo/Pedido.php");

    $filtro = $_POST["filtro"];

    $pedido = new Pedido();

    $pedidos = $pedido->filtrarPedidos($filtro);

    echo '<table class="table table-primary table-striped table-hover table align-middle table-responsive-sm">
    <thead class="text-center table-dark">
    <th scope="col">ID de pedido</th><th scope="col">Usuario</th><th scope="col">Factura</th><th scope="col">Fecha del pedido</th><th scope="col" class="text-center">Acciones</th>
    </thead>';
    
    for ($i = 0; $i < count($pedidos); $i++) {
        echo '<tr>
            <td class="text-center px-3">' . $pedidos[$i]["ID_PEDIDO"] . '</td>
            <td class="text-center px-3">' . $pedidos[$i]["EMAIL_USUARIO"] . '</td>
            <td class="text-center px-3">
                <a href="' . $pedidos[$i]["FACTURA"] .'" target="_blank" class="btn boton2 px-5">Ver factura</a> 
            </td>
            <td class="text-center px-3">' . $pedidos[$i]["FECHA"] . '</td>
            <td class="text-center px-3">
                <form action="../controlador/ctrEliminarPedido.php" method="post">
                    <input type="submit" class="btn boton2 mb-1 mb-xl-0" value="Eliminar">
                    <input type="hidden" name="idPedido" value="' . $pedidos[$i]["ID_PEDIDO"] . '">
                </form>
            </td>
        </tr>'; 
        }  
    echo '</table>';
?>