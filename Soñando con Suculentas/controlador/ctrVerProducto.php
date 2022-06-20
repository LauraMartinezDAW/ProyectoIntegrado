<?php
/* Controlador que muestra los productos */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Llamada al modelo.
require_once("../modelo/Producto.php");
require_once("../modelo/Comentario.php");

if (isset($_SESSION["usuario"])) {
    if (isset($_POST["idProducto"]) || isset($_POST["id_producto"]) || isset($idProducto)) {
        // Si está establecido idProducto, es que se ha entrado a través de la tienda. Si no, ya tenemos ese 
        // dato al haber entrado desde la vista del producto.
        if (isset($_POST["idProducto"])) {
            $idProducto = $_POST["idProducto"];
        } 

        // Conecto con la base de datos y obtengo los datos que necesito de los productos
        $producto = new Producto();
        $comentario = new Comentario();

        $productos = $producto->getDatosProductoId($idProducto);
        $comentarios = $comentario->getComentarios($idProducto);

        require_once("../vista/producto.php");

    } else {
        echo "header location tienda de ver producto";
        header("location:ctrTienda.php");
    }

} else {
    echo "controlador de ver producto";
    header("location:../vista/index.php");
}

?>