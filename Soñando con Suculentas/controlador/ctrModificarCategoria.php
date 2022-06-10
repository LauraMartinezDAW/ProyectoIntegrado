<?php
    /* Controlador para modificar el nombre de una categoría */

    session_start();

    // Si el usuario es administrador
    if(isset($_SESSION["admin"])) {  

        // Llamada al modelo
        require_once("../modelo/Producto.php");
        require_once("../funciones/valorSeguro.php"); 

        // Si está establecida la variable nombre, es que ya se ha pasado por el formulario
        if (isset($_POST["nombre"])) {
            $nuevoNombre = valorSeguro($_POST["nombre"]);
            $idCat = $_POST["idCat"];

            $producto = new Producto();
            $catCambiada = $producto->modificarCategoria($idCat, $nuevoNombre);

            $categorias = $producto->getCategorias();
            require_once("../vista/modificarCategoria.php");

            if ($catCambiada) {
                echo "<script>
                    Swal.fire({
                        text: 'La categoría se ha modificado',
                        icon: 'success',
                        background: 'rgb(253, 253, 253)',
                        showConfirmButton: true,
                        timer: 5000,
                        customClass: {
                            popup: 'ventanaConfirm'
                        }       
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        text: 'No se ha podido modificar la categoría',
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
        
        $producto = new Producto();
        $categorias = $producto->getCategorias();
        require_once("../vista/modificarCategoria.php");

    } else {
        header("location:../vista/index.php");
    }

?>