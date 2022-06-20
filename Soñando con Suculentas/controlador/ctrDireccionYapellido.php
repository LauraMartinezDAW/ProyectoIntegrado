<?php
/* Controlador para introducir la dirección y el primer apellido antes de finalizar la compra */

session_start();

if(isset($_SESSION["usuario"])) {

    require_once("../modelo/Usuario.php");
    $usuario = new Usuario();

    if(isset($_POST["direccion"])) {

        $direccion = $_POST["direccion"];

        $usuario->setDireccion($_SESSION["email"], $direccion);
    }

    if (isset($_POST["apellido1"])) {

        $apellido = $_POST["apellido1"];

        $usuario->setApellido1($_SESSION["email"], $apellido);

    }

    header("location: ctrCompraFinalizada.php");
} else {
    header("location:../index.php");
}
?>