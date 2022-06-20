<?php

/* Controlador para el formulario de contacto */

session_start();

// Si se ha entrado por el formulario
if (isset($_POST["inputNombre"])) {

    $nombreUsuario = $_POST["inputNombre"];
    $email = $_POST["inputEmail"];
    $consulta = $_POST["textArea"];
    $asunto = 'Soñando con Suculentas';

    echo "NOMBRE " . $nombreUsuario;
    echo "EMAIL " . $email;
    echo "CONSULTA " . $consulta;

    if (strlen($_FILES["foto"]["name"]) != 0)  {
        /* Procesamiento de la subida de la foto */

        //nombre original del fichero
        $nombre = $_FILES["foto"]["name"]; 
        //nombre temporal del fichero con ruta
        $nomTemp = $_FILES["foto"]["tmp_name"]; 
        //ruta donde dejaré al fichero
        $destino = "../imagenesSubidas/" . $nombre;

        $exten = pathinfo($nombre); //carga datos fichero
        // Si el fichero tiene extensión png, jpeg, jpg
        if (strcmp(strtolower($exten["extension"]),"png") == 0 || strcmp(strtolower($exten["extension"]),"jpeg") == 0 || strcmp(strtolower($exten["extension"]),"jpg") == 0) {

            if($_FILES["foto"]["error"] == 0){
                move_uploaded_file($nomTemp, $destino);
                unset($_FILES["foto"]);
            }

        } else {
            require_once("../vista/formModificarProducto.php");
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

    }


    // Dirección a la que se va a enviar el contenido del formulario
    $to = "martinez.cordoba.laura@iescamas.es";

    // Contenido del mensaje.
    $body = "De: " . $nombreUsuario . "\r\n";
    $body .= "Email: " . $email . "\r\n";
    $body .= "Consulta: " . $consulta . "\r\n";



    // Enviamos el mensaje.
    mail($to, $asunto, $body);

} else {
    header("location:../index.php");
}

?>