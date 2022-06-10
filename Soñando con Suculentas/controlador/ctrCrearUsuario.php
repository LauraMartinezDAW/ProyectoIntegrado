<?php
/* Controlador de crear usuario */

session_start();

// Llamada al modelo y a la función valor seguro.
require_once("../modelo/Usuario.php");
require_once("../funciones/valorSeguro.php");

// Si el usuario es administrador
if(isset($_SESSION["admin"])) {  
    if (/* preg_match("/[a-zA-Z0-9]{5,10}/", */ valorSeguro($_POST["password"])) {
        $email = valorSeguro($_POST["email"]);
        $password = md5($_POST["password"]);
        $nombre_usuario = valorSeguro($_POST["nombre"]);

        if (isset($_POST["apellido1"])) {
            $apellido1 = valorSeguro($_POST["apellido1"]);
        } else {
            $apellido1 = NULL;
        }

        if (isset($_POST["apellido2"])) {
            $apellido2 = valorSeguro($_POST["apellido2"]);
        } else {
            $apellido2 = NULL;
        }

        if (isset($_POST["direccion"])) {
            $direccion = valorSeguro($_POST["direccion"]);
        } else {
            $direccion = NULL;
        }

        if (isset($_POST["tlf"])) {
            $tlf = valorSeguro($_POST["tlf"]);
        } else {
            $tlf = NULL;
        }

        if (isset($_POST["administrador"])) {
            $administrador = 1;
        } else {
            $administrador = 0;
        }
    
        $usuario = new Usuario();
        $comprobarSiExiste = $usuario->getNombreUsuario($email);
        
        if (!$comprobarSiExiste) {

                $nuevoUsuario = $usuario->registroUsuario($email, $password, $nombre_usuario, $apellido1, $apellido2, $direccion, $tlf, $administrador);
                echo "Nuevo usuario " . $nuevoUsuario;
                // Si el usuario se ha insertado
                if ($nuevoUsuario) {
                    require_once("../vista/crearUsuario.php");
                    echo "<script>
                    Swal.fire({
                        text: '¡Cuenta creada!',
                        icon: 'success',
                        background: 'rgb(253, 253, 253)',
                        showConfirmButton: true,
                        timer: 5000,
                        customClass: {
                            popup: 'ventanaConfirm'
                        }       
                    });
                </script>";
                // Si no se ha podido insertar 
                } else {

                    require_once("../vista/crearUsuario.php");
                    echo "<script>
                    Swal.fire({
                        text: 'No se ha podido crear la cuenta',
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
            require_once("../vista/crearUsuario.php");
            echo "<script>
                Swal.fire({
                    text: 'Ya existe un usuario con esa dirección de email',
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

    }
// Si no es administrador o no hay usuario, redirijo al index.php
} else {
    echo "ENTRA AQUÍ?";
    header("location:../index.php");
}

?>