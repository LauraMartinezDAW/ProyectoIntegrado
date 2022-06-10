<?php

/* Controlador para modificar un producto */

session_start();

// Si el usuario es administrador
if(isset($_SESSION["admin"])) {  

    // Llamada al modelo
    require_once("../modelo/Producto.php");
    require_once("../funciones/valorSeguro.php");

    // Si se ha entrado por el formulario
    if (isset($_POST["idProducto"])) {
            $idProducto = $_POST["idProducto"];
            $producto = new Producto();

            if (strlen($_FILES["foto"]["name"]) != 0)  {
                /* Procesamiento de la subida de la foto */

                //nombre original del fichero
                $nombre = $_FILES["foto"]["name"]; 
                //nombre temporal del fichero con ruta
                $nomTemp = $_FILES["foto"]["tmp_name"]; 
                //ruta donde dejaré al fichero
                $destino = "../img/" . $nombre;

                $exten = pathinfo($nombre); //carga datos fichero
                // Si el fichero tiene extensión png, jpeg, jpg
                if (strcmp(strtolower($exten["extension"]),"png") == 0 || strcmp(strtolower($exten["extension"]),"jpeg") == 0 || strcmp(strtolower($exten["extension"]),"jpg") == 0) {

                    if($_FILES["foto"]["error"] == 0){
                        move_uploaded_file($nomTemp, $destino);
                        unset($_FILES["foto"]);
                    }

                } else {
                    require_once("../vista/formModificarProducto.php");
                    echo "<script>
                        Swal.fire({
                            text: 'Debe introducir un formato de imagen válido (png, jpeg, jpg)',
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
                $destino = $_POST["fotoActual"];
            }

            $descripcion = valorSeguro($_POST["desc"]);
            $precio = valorSeguro($_POST["precio"]);
            $tamanio = valorSeguro($_POST["tamanio"]);

            // Si no se ha introducido un nuevo tamaño, se mantiene el que tenía
            if ($tamanio != 'S' && $tamanio != 'M' && $tamanio != 'L' ) {
                $tamanio = $_POST["tamanioActual"];
            }

            $stock = $_POST["stock"];

            $modificado = $producto->modificarProducto($idProducto, $descripcion, $destino, $precio, $tamanio, $stock);

            require_once("ctrModificarProducto.php");

            if ($modificado) {
                echo "<script>
                    Swal.fire({
                        text: 'El producto se ha modificado',
                        icon: 'success',
                        background: 'rgb(253, 253, 253)',
                        showConfirmButton: true,
                        timer: 5000,
                        customClass: {
                            popup: 'ventanaConfirm'
                        }       
                    });
                </script>";

            // Si no se ha podido modificar 
            } else {
                echo "<script>
                    Swal.fire({
                        text: 'No se ha podido modificar el producto',
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
        

    } else {
        header("location:../vista/index.php");
    }
} else {
    header("location:../vista/index.php");
}

?>