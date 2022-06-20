<?php
    /* Controlador para finalizar la compra */
    session_start();

    require_once("../dompdf/autoload.inc.php");
    use Dompdf\Dompdf;

    if (isset($_SESSION["usuario"])) {

        $cesta = $_SESSION["cesta"];
        require_once("../modelo/Usuario.php");
        require_once("../modelo/Pedido.php");

        if (!empty($cesta)) {

            $usuario = new Usuario();
            $datosUsuario = $usuario->getDatosUsuario($_SESSION["email"]);

            // Si el usuario no ha facilitado su dirección
            if (is_null($datosUsuario["DIRECCION"]) || empty($datosUsuario["DIRECCION"])) {
                
                require_once("../vista/introducirDireccion.php");

            } else if (is_null($datosUsuario["APELLIDO1"]) || empty($datosUsuario["APELLIDO1"])) {
                require_once("../vista/introducirApellido1.php");

            // Si el usuario tiene dirección y primer apellido se finaliza la compra
            } else {
                // Guardo que se ha finalizado la compra para controlar que se vuelva a la tienda de forma correcta
                $_SESSION["compraFinalizada"] = true;

                // Establezco la zona horaria que nos corresponde para que aparezca la hora correcta en la factura.
                date_default_timezone_set('Europe/Madrid');

                // Guardo la fecha con el formato dia-mes-año-hora-minutos-segundos
                $fechaPedido = date("Y-m-d-G-i");
                $_SESSION["fechaFactura"] = date("d-m-y") ;

                // Inserto el pedido en la base de datos
                $pedido = new Pedido();
                $pedidoInsertado = $pedido->insertarPedido($_SESSION["email"], $fechaPedido);

                // Recupero el id del pedido para incluirlo en la factura
                $_SESSION["idPedido"] = $pedido->getIdPedidoPorFecha($fechaPedido);


                // Genero la factura
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
        
                $output = $dompdf->output();
                // Guardo la factura en la carpeta que he creado para ello
                file_put_contents("../facturas/" . $_SESSION["email"] . $fechaPedido . ".pdf", $output);
                $factura = "../facturas/" . $_SESSION["email"] . $fechaPedido . ".pdf";

                $pedido->setFactura($_SESSION["idPedido"], $factura);

                // Dirijo a la vista de compra finalizada
                header("location:../vista/compraFinalizada.php");
            }        
        


        } else {
            require_once("ctrTienda.php");
        }



    // Si no hay sesión, se lleva al index
    } else {
        header("location:../index.php");
    }
?>