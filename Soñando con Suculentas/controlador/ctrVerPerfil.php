<?php
/* Controlador para entrar en el perfil */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["usuario"])) {
    
    require_once("../modelo/Usuario.php");
    
    $usuario = new Usuario();
    $datosUsuario = $usuario->getDatosUsuario($_SESSION["email"]);

    require_once("../vista/perfil.php");

} else {
    header("location:../vista/index.php");
}

?>