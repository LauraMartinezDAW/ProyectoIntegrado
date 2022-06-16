<?php
    /* Controlador para finalizar la compra */

    session_start();
    echo "USUARIO " . $_SESSION["usuario"];
    if (isset($_SESSION["usuario"])) {

        $cesta = $_SESSION["cesta"];
        echo "CESTA " . $_SESSION["cesta"];
        require_once("../modelo/Usuario.php");

        if (!empty($cesta)) {

            $usuario = new Usuario();
            $datosUsuario = $usuario->getDatosUsuario($_SESSION["email"]);

            // Si el usuario no ha facilitado su dirección
            if (is_null($datosUsuario["DIRECCION"]) || empty($datosUsuario["DIRECCION"])) {
                if (is_null($datosUsuario["APELLIDO1"]) || empty($datosUsuario["APELLIDO1"])) {
                    
                }


            // Si el usuario ya ha introducido su dirección se finaliza la compra
            } else {

                header("location:../vista/compraFinalizada.php");
                //xHacer PONER LO DE LA FACTURA
        
            }


        } else {
            echo "CESTA VACÍA";
            /* require_once("ctrTienda.php"); */
        }



    // Si no hay sesión, se lleva al index
    } else {
        header("location:../index.php");
    }
?>