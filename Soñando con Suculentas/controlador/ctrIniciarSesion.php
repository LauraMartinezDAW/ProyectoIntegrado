<?php
/* Controlador del inicio de sesión */

// Llamada al modelo y a la función valor seguro.

use function PHPSTORM_META\type;

require_once("../modelo/Usuario.php");
require_once("../funciones/valorSeguro.php");

// Si se ha llegado a través del formulario
if(isset($_POST["email"])) {
    $email = valorSeguro($_POST["email"]);
    $password = md5($_POST["password"]);

    $usuario = new Usuario();
    $email = $usuario->getEmailUsuario($email, $password);

    if ($email) {
        // Si existe el usuario y la contraseña es correcta, inicio la sesión, guardo el nombre del usuario y su email
        // e inicializo y guardo en la sesión el array que usaré como cesta de la compra.
        session_start();
        $_SESSION["email"] = $email["email"];

        $nombre_usuario = $usuario->getNombreUsuario($_SESSION["email"]);
        $_SESSION["usuario"] = $nombre_usuario["nombre_usuario"];
        
        $_SESSION["cesta"] = array();

        // Recojo en una variable si el usuario es administrador o no
        $admin = $usuario->esAdministrador($_SESSION["email"]);
        
        if ($admin) {
            $_SESSION["admin"] = true;
        }
        

        // Llamada al controlador para mostrar los productos.
        require_once("../vista/index.php");

    } else {
        // Si los datos no son correctos
        require_once("../vista/index.php");
    }

// Si no se ha llegado por el formulario se redirige al index para que se inicie sesión
} else {
    header("location:../vista/index.php");
}
?>