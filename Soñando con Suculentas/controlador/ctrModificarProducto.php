<?php

/* Controlador para modificar un producto */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Si el usuario es administrador
if(isset($_SESSION["admin"])) {  

    // Llamada al modelo
    require_once("../modelo/Producto.php");

    // Si está establecido el id del producto, significa que ya hemos elegido el producto a modificar y obtenemos sus datos
    // para rellenar el formulario
    if (isset($_POST["idProducto"])) {

        $producto = new Producto();
        $datosProducto = $producto->getDatosProductoId($_POST["idProducto"]);
        require_once("../vista/formModificarProducto.php");

    // Si no está establecido recuperamos todos los productos existentes
    } else {

        $producto = new Producto();
        $productos = $producto->getProductos();
        require_once("../vista/modificarProducto.php");
    }

} else {
    header("location:../vista/index.php");
}

?>