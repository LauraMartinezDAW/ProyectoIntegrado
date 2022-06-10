<?php
/* Controlador de agregar producto */

session_start();
// Si se ha iniciado sesión como administrador
if(isset($_SESSION["admin"])) {  

    // Llamada al modelo y a la función valor seguro.
    require_once("../modelo/Producto.php");
    require_once("../funciones/valorSeguro.php");

    // Si la categoría está establecida, es que se ha entrado por el formulario
    if (isset($_POST["categoria"])) {
        // Si el tamaño no es S, M o L, se devuelve a la página del formulario
        if ($_POST["tamanio"] == "S" || $_POST["tamanio"] == "M" || $_POST["tamanio"] == "L") {

            $categoria = valorSeguro($_POST["categoria"]);
            $tipo_planta = valorSeguro($_POST["tipoPlanta"]);
            
            /* Procesamiento de la subida de la foto */

            //nombre original del fichero
            $nombre=$_FILES["foto"]["name"]; 
            //nombre temporal del fichero con ruta
            $nomTemp = $_FILES["foto"]["tmp_name"]; 
            //ruta donde dejaré al fichero
            $destino = "../img/" . $nombre;

            $exten = pathinfo($nombre); //carga datos fichero
            // Si el fichero tiene extensión png, jpeg, jpg
            if(strcmp(strtolower($exten["extension"]),"png") == 0 || strtolower(($exten["extension"]),"jpeg") == 0 || strtolower(($exten["extension"]),"jpg") == 0) {

                if($_FILES["foto"]["error"]==0){
                    move_uploaded_file($nomTemp, $destino);
                }
            } else {
                require_once("../vista/agregarProducto.php");
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
            $precio = valorSeguro($_POST["precio"]);
            $descripcion = valorSeguro($_POST["descripcion"]);
            $tamanio = valorSeguro($_POST["tamanio"]);
            $stock = valorSeguro($_POST["stock"]);

            $producto = new Producto();
            $insertado = $producto->insertarProducto($categoria, $tipo_planta, $destino, $precio, $descripcion, $tamanio, $stock);

            if ($insertado) {
                require_once("../vista/agregarProducto.php");
                echo "<script>
                    Swal.fire({
                        text: 'Producto insertado',
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
                require_once("../vista/agregarProducto.php");
                echo "<script>
                    Swal.fire({
                        text: 'No se ha podido agregar el producto',
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
            require_once("../vista/agregarProducto.php");
            echo "<script>
                Swal.fire({
                    text: 'Debe seleccionar un tamaño válido',
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
        header("location:../vista/index.php");
    }


} else {
    header("location:../vista/index.php");
}

?>