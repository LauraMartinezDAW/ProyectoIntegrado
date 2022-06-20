<?php

    // Llamada al modelo.
    require_once("../modelo/Producto.php");

    $filtro = $_POST["filtro"];

    $producto = new Producto();

    $productos = $producto->filtrarProductos($filtro);

    for ($i = 0; $i < count($productos); $i++) {
        
        echo '<div class="col">
            <div class="card p-0">
                <div class="card-body">                                               
                    <h4 class="text-center">' . $productos[$i]["NOMBRE_CATEGORIA"] .' '. $productos[$i]["NOMBRE_TIPO"] .' '. $productos[$i]["TAMANIO"] .'</h4>
                </div>
                <div class="div-img">
                    <img src="' . $productos[$i]["FOTO"] . '" class="card-img-top" alt="Echeveria Dionisos M">
                </div>';

                echo "<form action='../controlador/ctrVerProducto.php' method='post' class='btn col-12 mx-auto my-3 fs-6'>                                 
                        <input type='hidden' name='idProducto' value='" . $productos[$i]["ID_PRODUCTO"] . "'>
                        <input type='submit' class='btn col-7 mx-auto my-3 boton2 fs-6' value='Ver producto'>
                    </form>
            </div>
        </div>";
    }
?>