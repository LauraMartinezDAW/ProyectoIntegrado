<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- cdn para los iconos propios de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/bootstrap.css"/>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="shortcut icon" href="../img/botanic.svg" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Merienda:wght@400;700&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/16f71d5ae1.js" crossorigin="anonymous"></script>
    <title>Formulario de contacto | Soñando con Suculentas</title>
</head>

<body>
    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION["usuario"])) {
            // Guardo el nombre de usuario
            $usuario = $_SESSION["usuario"];
    
            // Guardo
            /* $_SESSION["fechaSesion"] = date("j-n-Y H:i:s"); 
            echo "FECHA Y HORA INICIO SESION " . $_SESSION["fechaSesion"];*/
    
            // Deshabilito el offcanvas de inicio de sesión / registro
            $bsTarjet = "";
            // Habilito el enlace al perfil de usuario
            $href = "../controlador/ctrVerPerfil.php";
    
        } else {
            $usuario = "Inicia sesión";
            $bsTarjet = "#iniciaSesion";
            $href = "";
            echo "<script></script>";
        }
    ?>
    <header class="mb-lg-5 mb-xl-5 mb-2">
        <div id="cabecera" class="d-flex justify-content-center align-items-center p-sm-5 p-lg-5 mb-3">
            <h1><a class="display-2 letraCursiva colorVerde" href="index.html">Soñando con Suculentas</a></h1>
        </div>
    </header>
    <div class="container-fluid">
        <nav aria-label="breadcrumb" class="px-4">
            <ol class="breadcrumb" >
                <li class="breadcrumb-item ps-2"><a href="index.html" class="migasPan">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span class="migasPanActivo">Formulario de contacto</span></li>
            </ol>
        </nav>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light px-4">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 border-bottom">
                    <li class="nav-item">
                        <a class="nav-link fs-5 me-2" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 me-2" href="cuidados.html#ubicacion">Ubicación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 me-2" href="cuidados.html#riego">Riego</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="cuidados.html#sustrato">Sustrato</a>    
                    </li>
                    <?php

                    if (isset($_SESSION["usuario"])) {
                        echo "<li class='nav-item'>
                            <a class='nav-link fs-5' href='../controlador/ctrTienda.php'>Tienda</a>    
                        </li>";

                        if (isset($_SESSION["admin"])) {
                            echo "<li class='nav-item'>
                                <a class='nav-link fs-5' href='../vista/administracion.php'>Administración</a>    
                            </li>";
                        }
                    }
                    ?>

                </ul>
                <div class="d-flex p-0 flex-md-row flex-column ancho50">
                <a href="<?=$href?>" class="me-4 px-3 py-2 rounded-pill fw-bold boton text-center" role="button" data-bs-toggle="offcanvas" data-bs-target="<?=$bsTarjet?>" aria-controls="offcanvasExample">
                    <?=$usuario?>
                </a>
                <?php
                if (isset($_SESSION["usuario"])) {
                    echo "<button id='botonCerrarSesion' class='me-4 px-3 py-2 rounded-pill fw-bold boton text-center'>Cerrar sesión</button>";
                    echo "<script>
                            let hayUsuario = " . isset($_SESSION["usuario"]). ";   
                            let esIndex = false;       
                        </script>";
                }
                ?>
            </div>
        </div>
    </nav>

    <!--Contenido principal-->
    <main class="container d-flex flex-column align-items-center p-3 my-4">      
        <h2 class="letraCursiva text-center display-5 mb-4 pt-3 colorVerde">Mándanos un mensaje</h2>
        <form action="../controlador/ctrFormContacto.php" method="post" id="contacto" class="d-flex flex-column col-lg-5 py-4 needs-validation" novalidate enctype="multipart/form-data">        
            <div class="my-3 col-10 mx-auto">
                <input type="text" class="form-control ps-1" id="inputNombre" name="inputNombre" placeholder="Introduce tu nombre">
            </div>
            <div class="my-3 col-10 mx-auto">
                <input type="email" class="form-control ps-1" id="inputEmail" name="inputEmail" placeholder="Introduce tu email" required>
                <div class="invalid-feedback">
                    Debes introducir tu dirección de correo electrónico.
                </div>
            </div>
            <div class="my-3 col-10 mx-auto">
                <textarea class="form-control" name="textArea" id="textArea" cols="60" rows="7" placeholder="Escribe aquí tu mensaje" required></textarea>
                <div class="invalid-feedback">
                    ¿Qué nos quieres contar?
                </div>
            </div>
                <div class="my-3 col-10 mx-auto">
                    <h2 class="colorVerde letraCursiva fs-3">¿Qué suculentas son tus favoritas?</h2>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="cactus" checked>
                        <label class="form-check-label" for="cactus">Cactáceas</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="noCac">
                        <label class="form-check-label" for="noCac">No cactáceas</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="tropicales">
                        <label class="form-check-label" for="tropicales">Tropicales</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="africanas">
                        <label class="form-check-label" for="africanas">Africanas</label>
                    </div>
                </div>
            <div class="my-3 col-10 mx-auto">
                <p class="mb-2 letraCursiva fs-4 colorVerde">¿Necesitas enviarnos una foto?</p>
                <input class="form-control form-control-sm" name="foto" id="foto" type="file">
                <div class="text-muted mb-2">Formatos válidos: png, jpeg, jpg</div>
            </div>
            <div class="my-3 col-10 mx-auto form-check">
                <input class="form-check-input boton" type="checkbox" value="" id="flexCheckDefault" required>
                <label class="form-check-label" for="flexCheckDefault">
                    Acepto los Términos de Uso y La Política de Privacidad.
                </label>
                <div class="invalid-feedback">
                    Debes aceptar para mandar tu mensaje.
                </div>
            </div>
            
            <button class="btn col-10 mx-auto my-3 boton2 fs-5" type="submit">Enviar</button>
        </form>
        
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
                        <p><a href="formulario.html"><i class="fas fa-align-justify me-3"></i>Rellena nuestro formulario</a></p>
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
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        // Función para la validación del formulario.
        (function () {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>