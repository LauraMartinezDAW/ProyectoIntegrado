<?php

/* Controlador para modificar un usuario */

session_start();

// Si el usuario es administrador
if(isset($_SESSION["admin"])) {  

    // Llamada al modelo
    require_once("../modelo/Usuario.php");

    // Si está establecido el email, significa que ya hemos elegido el usuario a modificar y obtenemos sus datos
    // para rellenar el formulario
    if (isset($_POST["email"])) {

        $usuario = new Usuario();
        $datosUsuario = $usuario->getDatosUsuario($_POST["email"]);
        require_once("../vista/formModificarUsuario.php");

    // Si no está establecido recuperamos todos los usuarios existentes
    } else {

        $usuario = new Usuario();
        $usuarios = $usuario->getUsuarios();
        require_once("../vista/modificarUsuario.php");
    }

} else {
    header("location:../vista/index.php");
}

?>