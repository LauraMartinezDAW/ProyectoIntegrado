<?php
/* Controlador que muestra los productos */
    session_start();
    // Llamada al modelo.
    require_once("../modelo/Producto.php");

    // Si hay sesión
    if (isset($_SESSION["usuario"])) {
        // Llamada al modelo y a la función valor seguro
        require_once("../modelo/Usuario.php");
        require_once("../funciones/valorSeguro.php");

        // Conecto con la base de datos y obtengo los productos con el método correspondiente.
        $producto = new Producto();
        $productos = $producto->datosProducto();

        // Llamada a la vista productos.
        require_once("../vista/tienda.php");
    // Si no hay sesión se redirige al index
    } else {
        header("location:../vista/index.php");
    }
?>