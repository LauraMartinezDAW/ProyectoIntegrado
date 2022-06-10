<?php

/* Controlador para modificar un usuario */

session_start();

// Si el usuario es administrador
if(isset($_SESSION["admin"])) {  

    // Llamada al modelo
    require_once("../modelo/Usuario.php");
    require_once("../funciones/valorSeguro.php");

    // Si se ha entrado por el formulario
    if (isset($_POST["emailUsuario"])) {
        $usuario = new Usuario();

        $nombre_usuario = valorSeguro($_POST["nombre"]);

        if ($_POST["password"] != '') {
            $password = md5($_POST["password"]);
        } else {
            $pass = $usuario->getContrasena($_POST["emailUsuario"]);
            $password = $pass["PASSWORD"];
        }

        if ($_POST["apellido1"] != '') {
            $apellido1 = valorSeguro($_POST["apellido1"]);
        } else {
            $apellido1 = NULL;
        }

        if ($_POST["apellido2"] != '') {
            $apellido2 = valorSeguro($_POST["apellido2"]);
        } else {
            $apellido2 = NULL;
        }

        if ($_POST["direccion"] != '') {
            $direccion = valorSeguro($_POST["direccion"]);
        } else {
            $direccion = NULL;
        }

        if ($_POST["tlf"] != '') {
            $telefono = valorSeguro($_POST["tlf"]);
        } else {
            $telefono = NULL;
        }

        if (isset($_POST["administrador"])) {
            $administrador = 1;
        } else {
            $administrador = 0;
        }

        $modificado = $usuario->modificarUsuario($_POST["emailUsuario"],$password, $nombre_usuario, $apellido1, $apellido2, $direccion, $telefono, $administrador);

        require_once("../vista/modificarUsuario.php");

        if ($modificado) {
            echo "<script>
                Swal.fire({
                    text: 'El usuario se ha modificado',
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
                    text: 'No se ha podido modificar el usuario',
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
}

?>