<?php
/* Controlador de envío de comentarios */

session_start();

// Llamada al modelo y a la función valor seguro.
require_once("../modelo/Comentario.php");
require_once("../funciones/valorSeguro.php");

// Si hay sesión y hay contenido en el textarea, inserto el comentario en la base de datos 
//y devuelvo a la página del producto.
if(isset($_SESSION["usuario"])) {  
    if (strlen(valorSeguro($_POST["textArea"])) > 0) {
        $idProducto = $_POST["id_producto"];
        $comentario = new Comentario();
        $comentario->insertarComentario(valorSeguro($_POST["textArea"]), $idProducto, $_SESSION["email"]);
        
        require_once("ctrVerProducto.php");
    } else {
        require_once("ctrVerProducto.php");
    }

}
?>