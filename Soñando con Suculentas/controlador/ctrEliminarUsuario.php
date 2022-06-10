<?php
    /* Controlador para eliminar a un usuario */

    session_start();

    // Si el usuario es administrador
    if(isset($_SESSION["admin"])) {  

        // Llamada al modelo
        require_once("../modelo/Usuario.php");

        // Si está establecido el email, significa que ya hemos elegido el usuario a eliminar
        if (isset($_POST["email"])) {
            $usuario = new Usuario();
            $eliminado = $usuario->eliminarUsuario($_POST["email"]);       
        
            require_once("../vista/eliminarUsuario.php");

            if ($eliminado) {
                echo "<script>
                    Swal.fire({
                        text: 'El usuario se ha eliminado',
                        icon: 'success',
                        background: 'rgb(253, 253, 253)',
                        showConfirmButton: true,
                        timer: 5000,
                        customClass: {
                            popup: 'ventanaConfirm'
                        }       
                    });
                </script>";

            // Si no se ha podido eliminar 
            } else {
                echo "<script>
                    Swal.fire({
                        text: 'No se ha podido eliminar el usuario',
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
        
        $usuario = new Usuario();
        $usuarios = $usuario->getUsuarios(); 
        require("../vista/eliminarUsuario.php");
        

    } else {
        header("location:../vista/index.php");
    }
?>