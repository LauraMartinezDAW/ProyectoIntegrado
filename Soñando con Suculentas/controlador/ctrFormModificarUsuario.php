<?php

/* Controlador para modificar un usuario */

session_start();

    // Llamada al modelo
    require_once("../modelo/Usuario.php");
    require_once("../funciones/valorSeguro.php");

    // Si se ha entrado por el formulario
    if (isset($_POST["emailUsuario"])) {
        $usuario = new Usuario();

        $nombre_usuario = valorSeguro($_POST["nombre"]);

        if (isset($_FILES["foto"]) && strlen($_FILES["foto"]["name"]) != 0)  {
            echo "entra en hay foto \n";
            /* Procesamiento de la subida de la foto */

            //nombre original del fichero
            $nombre = $_FILES["foto"]["name"]; 
            //nombre temporal del fichero con ruta
            $nomTemp = $_FILES["foto"]["tmp_name"]; 
            //ruta donde dejaré al fichero
            $destino = "../fotosPerfil/" . $nombre;

            $exten = pathinfo($nombre); //carga datos fichero
            // Si el fichero tiene extensión png, jpeg, jpg
            if (strcmp(strtolower($exten["extension"]),"png") == 0 || strcmp(strtolower($exten["extension"]),"jpeg") == 0 || strcmp(strtolower($exten["extension"]),"jpg") == 0) {

                if($_FILES["foto"]["error"] == 0) {
                    move_uploaded_file($nomTemp, $destino);
                    unset($_FILES["foto"]);
                }

            } else {
                if(isset($_SESSION["admin"])) { 
                    require_once("../vista/modificarUsuario.php");
                // Si no lo es, se devuelve a la página de perfil de usuario
                } else {
                    require_once("ctrVerPerfil.php");
                }
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
            echo "entra en no se manda nueva foto \n";
            $destino = $_POST["fotoActual"];
        }

        if (isset($_POST["password"])) {
            if ($_POST["password"] != '') {
                $password = md5($_POST["password"]);
            } else {
                $pass = $usuario->getContrasena($_POST["emailUsuario"]);
                $password = $pass["PASSWORD"];
            }
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

        $modificado = $usuario->modificarUsuario($_POST["emailUsuario"],$password, $destino, $nombre_usuario, $apellido1, $apellido2, $direccion, $telefono, $administrador);
        /* $datosUsuario = $usuario->getDatosUsuario($_SESSION["email"]); */

        // Si el usuario es administrador se devuelve a la página desde la que se modifica un usuario
        if(isset($_SESSION["admin"])) { 
            echo "A MODIFICAR USUARIO";
            require_once("ctrModificarUsuario.php");
        // Si no lo es, se devuelve a la página de perfil de usuario
        } else {
            require_once("ctrVerPerfil.php");
        }

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


?>