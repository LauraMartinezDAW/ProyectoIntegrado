<?php

    // Llamada al modelo.
    require_once("../modelo/Producto.php");

    $filtro = $_POST["filtro"];

    $producto = new Producto();

    $productos = $producto->filtrarProductos($filtro);

    echo '<table class="table table-primary table-striped table-hover table align-middle table-responsive-sm">
    <thead class="text-center table-dark">
    <th scope="col" colspan="2">Producto</th><th scope="col">Tamaño</th><th scope="col">Precio</th><th scope="col">Stock</th><th scope="col" class="text-center">Acciones</th>
    </thead>';
    
    for ($i = 0; $i < count($productos); $i++) {
            echo '<tr>
                <td class="text-center">' . $productos[$i]["NOMBRE_CATEGORIA"] . " " . $productos[$i]["NOMBRE_TIPO"] . '</td>
                <td class="text-center"><img src="' . $productos[$i]["FOTO"] . '" width="90px" alt="' . $productos[$i]["FOTO"] . '"></td>
                <td class="text-center">' . $productos[$i]["TAMANIO"] . '</td>
                
                
                <td class="text-center">' . $productos[$i]["PRECIO"] . '</td>
                <td class="text-center">' . $productos[$i]["STOCK"] . '</td>
                <td class="text-center">
                    <form action="../controlador/ctrEliminarProducto.php" method="post">
                        <input type="submit" class="btn boton2 mb-1 mb-xl-0" value="Eliminar">
                        <input type="hidden" name="idProducto" value="' . $productos[$i]["ID_PRODUCTO"] . '">
                        <input type="hidden" name="idTipoPlanta" value="' . $productos[$i]["ID_TIPO"] . '">
                        <input type="hidden" name="idCategoria" value="' . $productos[$i]["ID_CATEGORIA"] . '">
                    </form>
                </td>
            </tr>'; 
        }  
    echo '</table>';
?>