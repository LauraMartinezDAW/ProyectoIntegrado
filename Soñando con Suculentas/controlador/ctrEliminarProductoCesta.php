<?php
/* Controlador de la cesta */

session_start();

// Si hay usuario y la cesta no está vacía
if (isset($_SESSION["usuario"])) {

    $cesta = $_SESSION["cesta"];

    if (!empty($cesta)) {
        require_once("../modelo/Producto.php");  
        $producto = new Producto();
        $posicionProducto = $_POST["posProducto"];
        $idProducto = $cesta[$posicionProducto][6];        
        $stockOriginal = $_SESSION["stock"][$posicionProducto][1];
        
        $producto->modificarStock($stockOriginal, $idProducto);
        array_splice($cesta, $posicionProducto, 1);



        // Actualizo la cesta
        $_SESSION["cesta"] = $cesta;

        header("location:../controlador/ctrTienda.php");

    } else {
        require_once("ctrTienda.php");
    }


// Si no hay sesión, se lleva al index
} else {
    header("location:../index.php");
}
?>