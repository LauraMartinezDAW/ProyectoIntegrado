<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- cdn para los iconos propios de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="shortcut icon" href="../img/botanic.svg" type="image/x-icon"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Merienda:wght@400;700&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/16f71d5ae1.js" crossorigin="anonymous"></script>
    <!-- cdn de sweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Links necesarios para la comprobación de la contraseña -->
    <link rel="stylesheet" href="../pass-strength/dist/css/passtrength.css">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="../pass-strength/src/jquery.passtrength.js"></script>
    <style type="text/css">
        input#password, input#password2 {
            border-radius: 0;
        }
    </style>
    <title>Ajustes de Perfil | Soñando con Suculentas</title>
</head>

<body>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION["usuario"])) {
        echo "<script>
            let hayUsuario = true;
            let esIndex = false;
        </script>";
        
        echo '<header class="mb-lg-5 mb-xl-5 mb-2">
            <div id="cabecera" class="d-flex justify-content-center align-items-center p-sm-5 p-lg-5 mb-3">
                <h1><a class="display-2 letraCursiva colorVerde" href="index.html">Soñando con Suculentas</a></h1>
            </div>
        </header>';

        echo '<nav class="navbar navbar-expand-lg navbar-light px-4">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 border-bottom">
                        <li class="nav-item">
                            <a class="nav-link fs-5 me-2" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 me-2" href="cuidados.html#ubicacion">Ubicación</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 me-2" href="cuidados.html#riego">Riego</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 me-2" href="cuidados.html#sustrato">Sustrato</a>    
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 " href="#contactoFooter">Contacto</a>    
                        </li>
                        <li class="nav-item">
                        <a class="nav-link fs-5" href="../controlador/' . (isset($_SESSION["compraFinalizada"]) ? 'ctrVolverTienda.php' : 'ctrTienda.php') . '">Tienda</a>    
                        </li>';
                        if (isset($_SESSION["admin"])) {
                            echo "<li class='nav-item'>
                                <a class='nav-link fs-5' href='../vista/administracion.php'>Administración</a>    
                            </li>";
                        }

                    echo '</ul>
                    <div class="d-flex p-0 flex-md-row flex-column ancho50">
                        <a href="../vista/perfil.html" class="me-4 px-3 py-2 rounded-pill fw-bold boton text-center" role="button" data-bs-toggle="offcanvas" data-bs-target="<?=$bsTarjet?>" aria-controls="offcanvasExample">
                            ' . $_SESSION["usuario"] . 
                        '</a>
                        <button id="botonCerrarSesion" class="me-4 px-3 py-2 rounded-pill fw-bold boton text-center">Cerrar sesión</button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Migas de pan -->
        <div class="container-fluid mt-3 mb-4 row">
            <nav aria-label="breadcrumb" class="ps-4 col">
                <ol class="breadcrumb">
                <li class="breadcrumb-item ps-2"><a href="../index.php" class="migasPan">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <span class="migasPanActivo">Ajustes de perfil</span>
                    </li>
                </ol>
            </nav>
        </div>';

    echo '<main>
        <h2 class="letraCursiva display-4 text-center mb-4 colorVerde">Perfil</h2>
        <div class="container row py-4 px-0 my-4 mx-auto">
            <div class="col-2 p-0">
                <a href="../controlador/ctrVerPedidos.php" class="btn boton2 mb-1 mb-xl-0">Ver facturas</a>
            </div>
            <form action="ctrFormModificarUsuario.php" method="post" class="col-10 needs-validation d-flex flex-column flex-md-row justify-content-center" novalidate enctype="multipart/form-data">
                <div class="col-md-3 d-flex flex-column justify-content-center py-5 px-3 fondoTarjeta">
                    <p class="letraCursiva text-light text-center fs-4">Selecciona una foto de perfil</p>
                    <div><img src="' . $datosUsuario["FOTO_USUARIO"] . '" class="rounded img-fluid" alt="foto de usuario"></div>
                    <input type="hidden" name="fotoActual" value="' . $datosUsuario["FOTO_USUARIO"] . '">
                    <div class="mt-4 col-9 mx-auto">    
                        <input type="file" name="foto" class="form-control form-control-sm mx-auto">
                    </div>
                </div>
                <div class="row col-md-9 py-3 ps-5 " id="perfil2">
                    <div class="mb-3 col-lg-6">
                        <label for="email" class="form-label letraCursiva colorVerde fs-4 mb-1">Email</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill text-primary"></i></span>
                            <input type="email" class="form-control rounded-end" id="email" value="' . $datosUsuario["EMAIL"] . '" disabled readonly>
                            <!-- Al estar deshabilitado el input de email, paso el valor por el campo oculto -->
                            <input type="hidden" name="emailUsuario" value="' . $datosUsuario["EMAIL"] . '">
                        </div>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="nombre" class="form-label fs-4 letraCursiva colorVerde fs-4 mb-1">Nombre</label>
                        <div class="input-group ">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-list text-primary fw-bold"></i></span>
                            <input type="text" class="form-control rounded-end" id="nombre" name="nombre" required value="' . $datosUsuario["NOMBRE_USUARIO"] . '" placeholder="Escribe tu nombre">
                            <div class="invalid-feedback">
                                <p>Introduce un nombre, por favor</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="apellido1" class="form-label fs-4 letraCursiva colorVerde mb-1">Primer apellido</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text text-primary"></i></span>
                            <input type="text" id="apellido1" name="apellido1" value="' . $datosUsuario["APELLIDO1"] . '" placeholder="Escribe tu primer apellido" class="form-control" aria-label="Apellidos" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="apellido2" class="form-label fs-4 letraCursiva colorVerde mb-1">Segundo apellido</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text text-primary"></i></span>
                            <input type="text" id="apellido2" name="apellido2" value="' . $datosUsuario["APELLIDO2"] . '" placeholder="Escribe tu segundo apellido" class="form-control" aria-label="Apellidos" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label fs-4 letraCursiva colorVerde fs-4 mb-1">Dirección</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt-fill text-primary"></i></span>
                            <input type="text" class="form-control" id="direccion" name="direccion" required value="' . $datosUsuario["DIRECCION"] . '" placeholder="Escribe tu dirección">
                        </div>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="pssword" class="form-label letraCursiva colorVerde fs-4 mb-1">Contraseña</label>
                        <div class="input-group" style="flex-wrap: nowrap;">
                            <span class="input-group-text py-1" id="basic-addon1"><i class="bi bi-shield-lock-fill text-primary"></i></span>
                            <input type="password" class="form-control strength_meter rounded-end" name="password" id="password" placeholder="Escribe tu contraseña">
                        </div>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="pssword2" class="form-label letraCursiva colorVerde fs-4 mb-1">Confirma tu contraseña</label>
                        <div class="input-group" style="flex-wrap: nowrap;">
                        <span class="input-group-text py-1" id="basic-addon1"><i class="bi bi-shield-lock-fill text-primary"></i></span>
                        <input type="password" class="form-control rounded-end" id="password2" placeholder="Escribe tu contraseña">
                    </div>
                    <label id="mensaje_error" class="control-label col-md-12 text-success" style="display: block;">Las constraseñas sí coinciden</label>
                    </div>

                    <div class="mb-3 col-lg-6">
                        <label for="tlf" class="form-label letraCursiva colorVerde fs-4 mb-1">Teléfono</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill text-primary"></i></i></span>
                            <input  type="tel" id="tlf" name="tlf" class="form-control" placeholder="Número de teléfono" value="' . $datosUsuario["TELEFONO"] . '" aria-label="Telefono" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="mt-2 row justify-content-around">
                        <button type="submit" id="actPerfil" class="col-4 btn btn-secondary text-center text-white">Actualizar perfil</button>
                        <a href="../vista/index.php" role="button" class="col-4 btn btn-secondary text-center text-white">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <!-- Enlace a la parte superior de la página usando un icono de bootstrap-->
    <a href="#cabecera" class="fixed-bottom text-end">
        <i id="flecha" class="bi bi-chevron-double-up display-5 d-none d-sm-inline p-1"></i>
    </a>

    <!-- Footer -->
    <footer class="text-center bg-light text-dark descripcion_footer">
        <section class="pt-4 border-top ">
            <div class="container text-center text-md-start mt-5 ">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-3 col-xl-3 pt-2 mx-auto mb-4 text-dark">
                        <h6 class="text-uppercase mb-3 letraCursiva fw-bold fs-5">Soñando con suculentas</h6>
                        <p class="letra1-1rem text-center"> Un espacio para disfrutar de las suculentas, compartiendo experiencias e
                            información entre todas las personas que amamos estas plantas.
                        </p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Links de interés</h6>
                        <p><a target="_blank" href="https://succulentalley.com/types-of-succulents-with-pictures/">Identificación de suculentas</a></p>
                        <p><a target="_blank" href="http://www.manolithops.es/">Página sobre Lithops</a></p>
                        <p><a target="_blank" href="https://viverosaznaljarafe.com/">Vivero Aznaljarafe</a></p>
                        <p><a target="_blank" href="https://www.viverosbalbuena.com/">Vivero Balbuena</a></p>
                        <p><a target="_blank" href="https://foro.infojardin.com/forums/10-suculentas-no-cactaceas.39/">Foro de plantas suculentas no cactáceas</a></p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 ps-4">
                        <!-- Links -->
                        <h6 id="contactoFooter" class="text-uppercase fw-bold mb-4">Contacto</h6>
                        <p><a href="../vista/formulario.php"><i class="fas fa-align-justify me-3"></i>Rellena nuestro formulario</a></p>
                        <p><a href="mailto:scs@gmail.com"><i class="fas fa-envelope me-3"></i>Mándanos un email</a></p>
                        <p class="mb-0 fs-5"> Visita nuestras Redes Sociales</p>
                        <div class="d-flex justify-content-center">
                            <div class="d-inline-flex">
                                <a href="https://www.instagram.com/" target="_blank"
                                    class="fs-2 my-3 me-3"><i class="fab fa-instagram-square"></i></a>
                                <a href="https://es-es.facebook.com/" target="_blank" class="fs-2 m-3"><i class="fab fa-facebook-square"></i></a>
                                <a href="https://twitter.com/" target="_blank" class="fs-2 m-3"><i class="fab fa-twitter-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Copyright -->
        <div id="fondo-copyright" class="text-center text-secondary p-4 col-12">
            <p class="d-inline">© 2022 Copyright</p>
            <a class="text-secondary fw-bold" target="_blank" href="https://www.linkedin.com/in/laura-mart%C3%ADnez-557796171/">Laura Martínez</a>
        </div>
    </footer>';
    } else {
        header("location:../vista/index.php");
    }
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="../js/cerrarSesion.js"></script>
    <script>
        // Función para la validación del formulario.
        (function () {
          'use strict'

          var forms = document.querySelectorAll('.needs-validation');

          Array.prototype.slice.call(forms).forEach(function (form) {
              form.addEventListener('submit', function (event) {
                let con1 = document.getElementById("password").value;
                let con2 = document.getElementById("password2").value;             

                if (con1 !== con2) {
                  Swal.fire({
                    title: "Las contraseñas no coinciden",
                    icon: 'warning',
                    background: 'rgb(253, 253, 253)',
                    showConfirmButton: true,
                    timer: 5000,
                    customClass: {
                        popup: 'ventanaConfirm'
                    }       
                  }); 
                  
                  event.preventDefault();
                }

                if (!form.checkValidity()) {
                  event.preventDefault();
                  event.stopPropagation();
                } 

                form.classList.add('was-validated')
              }, false)
          })
        })()

        // Colores de seguridad contraseña 
        $('#password').passtrength({
          minChars: 5
        });

        $('#password').passtrength({
          tooltip: false,
          textWeak: "Débil",
          textMedium: "Media",
          textStrong: "Segura",
          textVeryStrong: "Muy segura",
        });

        $('#password2').passtrength({
          minChars: 5
        });

        $('#password2').passtrength({
          tooltip: false,
          textWeak: "Débil",
          textMedium: "Media",
          textStrong: "Segura",
          textVeryStrong: "Muy segura",
        });

        // Comparar contraseñas

        $(document).ready(function () {
          $('#mensaje_error').hide();  
        });

        var cambioDePass = function() {
          var cont = $('#password').val();
          var cont2 = $('#password2').val();
          if (cont == cont2) {
              $('#mensaje_error').hide();
              $('#mensaje_error').attr("class", "control-label col-md-12 text-success");
              $('#mensaje_error').show();
              $('#mensaje_error').html("Las constraseñas sí coinciden");
              if (cont == '' && cont2 == '') {
                $('#mensaje_error').hide();
              }
          } else {
              $('#mensaje_error').attr("class", "control-label col-md-12 text-danger");
              $('#mensaje_error').html("Las constraseñas no coinciden");
              $('#mensaje_error').show();
          }
        }

      $("#password").on('keyup', cambioDePass);
      $("#password2").on('keyup', cambioDePass);
    </script>
</body>
</html>