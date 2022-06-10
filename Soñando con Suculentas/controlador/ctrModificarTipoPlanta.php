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
            $idTipoPlanta = $_POST["idTipoPlanta"];

            $producto = new Producto();
            $tipoCambiado = $producto->modificarTipoPlanta($idTipoPlanta, $nuevoNombre);

            $tipos = $producto->getTiposPlanta();
            require_once("../vista/modificarTipoPlanta.php");
            
            if ($tipoCambiado) {
                echo "<script>
                    Swal.fire({
                        text: 'El tipo de planta se ha modificado',
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
                        text: 'No se ha podido modificar el tipo de planta',
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
        $tipos = $producto->getTiposPlanta();
        require_once("../vista/modificarTipoPlanta.php");

    } else {
        header("location:../vista/index.php"); 
    }

?>