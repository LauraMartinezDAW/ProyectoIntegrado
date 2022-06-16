<?php

/* Controlador para agregar productos a la cesta */

    // Inicio la sesión para poder acceder a sus variables
    session_start();
    // Si el usuario está establecido y se ha llegado a través de la página del producto
    if (isset($_SESSION["usuario"]) && isset($_POST["idProducto"])) {
        // Si se ha escogido una cantidad válida
        if ($_POST["cantidad"] != 'Cantidad') {
            // Llamada al modelo
            require_once("../modelo/Producto.php");

            $producto = new Producto();  
            $idProducto = $_POST["idProducto"];
            $cantidad = $_POST["cantidad"];     
            $cesta = $_SESSION["cesta"];
            $datosProducto = $producto->getDatosProductoId($_POST["idProducto"]);
            $foto = $datosProducto["FOTO"];
            $nombreProducto = $datosProducto["NOMBRE_CATEGORIA"] . ' ' . $datosProducto["NOMBRE_TIPO"];
            $precio = $datosProducto["PRECIO"];
            $tamanio = $datosProducto["TAMANIO"];
            $totalArticulo = $precio * $cantidad;
            $hayProducto = false;

            // Compruebo si hay ya hay un producto igual en la cesta
            if (!empty($cesta)) {
                for ($i = 0; $i < count($_SESSION["cesta"]); $i++) {
                    if (($cesta[$i][6]) == $idProducto) {
                        
                        $hayProducto = true;
                        $posProducto = $i;
                    } else {
                        $hayProducto = false;
                    }
                }
            }

            // Si ya se ha agregado ese producto a la cesta, sumo la nueva cantidad
            if ($hayProducto) {
                $cesta[$posProducto][3] += $cantidad;
            // Si se añade por primera vez, creo un array con los datos del producto y lo añado a la cesta
            } else {
                $datos = array($foto, $nombreProducto, $precio, $cantidad, $tamanio, $totalArticulo, $idProducto);
                array_push($cesta, $datos);
            }

            // Actualizo la cesta
            $_SESSION["cesta"] = $cesta;
            
            // Vuelvo a la tienda
            header("location:../controlador/ctrTienda.php");

        // Si la cantidad no es válida    
        } else {

            require_once("ctrVerProducto.php");
            echo "<script>
                Swal.fire({
                    text: 'Debe introducir una cantidad',
                    icon: 'warning',
                    background: 'rgb(253, 253, 253)',
                    showConfirmButton: true,
                    timer: 5000,
                    customClass: {
                        popup: 'ventanaConfirm'
                    }       
                });
            </script>";
        }

    } else {
        header("location:../index.php");
    }


?>