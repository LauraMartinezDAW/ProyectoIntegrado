<?php
/* Controlador para ver la factura */

session_start();
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;

// Si hay usuario y la cesta no está vacía
if (isset($_SESSION["usuario"])) {
    $cesta = $_SESSION["cesta"];
    if (!empty($cesta)) {
            
        require_once("../modelo/Usuario.php");
        
        $usuario = new Usuario();
        $datosCliente = $usuario->getDatosUsuario($_SESSION["email"]);
        
        
        $dompdf = new Dompdf();
        $opciones = $dompdf->getOptions();
        $opciones->set(array("isRemoteEnabled" => true));
        $opciones->setDefaultFont('Sans-serif');
        $dompdf->setOptions($opciones);

        ob_start();
        require_once("../vista/factura.php");
        $html = ob_get_clean();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("../factura.pdf", array("Attachmet" => false));
        
    } else {
        require_once("ctrTienda.php");
    }
// Si no hay sesión, se lleva al index
} else {
    header("location:../index.php");
}

?>