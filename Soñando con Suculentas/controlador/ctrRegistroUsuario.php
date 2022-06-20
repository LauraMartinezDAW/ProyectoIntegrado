<?php
/* Controlador del registro */

// Llamada al modelo y a la función valor seguro.
require_once("../modelo/Usuario.php");
require_once("../funciones/valorSeguro.php");
require_once("../funciones/esIgual.php");

// Si el alias está establecido (han entrado por formulario) y la contraseña coincide con el patrón, 
// inserto el usuario en la BBDD llamando al método correspondiente.
if(isset($_POST["nombre"])) {  
    if (preg_match("/(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[!%&@#$^*?_~]).{6,}/", valorSeguro($_POST["password1"]))) {
        $nombre_usuario = valorSeguro($_POST["nombre"]);
        $password1 = md5($_POST["password1"]);
        $password2 = md5($_POST["password2"]);
        $email = valorSeguro($_POST["emailRegistro"]);
        $destino = "../fotosPerfil/fotoPerfil.png";
    
        $usuario = new Usuario();
        $comprobarSiExiste = $usuario->getDatosUsuario($email);
        
        if (!$comprobarSiExiste) {
            if (esIgual($password1, $password2)) {

                $nuevoUsuario = $usuario->registroUsuario($email, $password1, $destino, $nombre_usuario);

                // Si el usuario se ha insertado
                if ($nuevoUsuario) {
                    require_once("../vista/index.php");
                    echo "<script>
                    Swal.fire({
                        text: '¡Cuenta creada!',
                        icon: 'success',
                        background: 'rgb(253, 253, 253)',
                        showConfirmButton: true,
                        timer: 5000,
                        customClass: {
                            popup: 'ventanaConfirm'
                        }       
                    });
                </script>";
                // Si no se ha podido insertar 
                } else {
                    echo "ENTRA EN EL ELSE?";

                    require_once("../vista/index.php");
                    echo "<script>
                        Swal.fire({
                            text: 'No se ha podido crear la cuenta',
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
            } else {
                require_once("../vista/index.php");
                echo "<script>
                    Swal.fire({
                        title: 'Las contraseñas no coinciden',
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
        } else {
            require_once("../vista/index.php");
            echo "<script>
                Swal.fire({
                    text: 'Ya existe un usuario con esa dirección de email',
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
    } else {
        require_once("../vista/crearUsuario.php");
        echo "<script>
            Swal.fire({
                text: 'La contraseña no coincide con el patrón',
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
// Si no se ha entrado por el formulario, redirijo al index.php
} else {
    echo "ENTRA AQUÍ?";
    header("location:../index.php");
}

?>