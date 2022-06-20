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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- cdn de sweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Soñando con suculentas | Compra finalizada</title>
</head>
<body>
<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Si hay usuario y la cesta no está vacía
    if (isset($_SESSION["usuario"])) {

        $cesta = $_SESSION["cesta"];

        if (!empty($cesta)) {

            echo '<header class="mb-lg-5 mb-xl-5 mb-2">
                <div id="cabecera" class="d-flex justify-content-center align-items-center p-sm-5 p-lg-5 mb-3">
                    <h1><a class="display-2 letraCursiva colorVerde" href="index.html">Soñando con Suculentas</a></h1>
                </div>
            </header>
    
            <!-- Menú -->
            <nav class="navbar navbar-expand-lg navbar-light px-4">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 border-bottom">
                            <li class="nav-item">
                                <a class="nav-link fs-5 me-2" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-5 me-2" href="cuidados.php#ubicacion">Ubicación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-5 me-2" href="cuidados.php#riego">Riego</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-5 me-2" href="cuidados.php#sustrato">Sustrato</a>    
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-5 " href="#contactoFooter">Contacto</a>    
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-5" href="../controlador/ctrVolverTienda.php">Tienda</a>    
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
                        <script>
                            let hayUsuario = ' . isset($_SESSION["usuario"]). ';          
                        </script>
                    </div>
                </div>
            </nav>


            <main class="container pb-2 my-5">      
                <div id="compraFinalizada" class="col-12 col-lg-8 col-xl-6 mx-auto p-3 d-flex flex-column align-items-center my-3">  
                    <h1 class="letraCursiva text-center display-5 mb-4 pt-3 colorVerde">¡Muchas gracias por su compra!</h1>
                    <div class="row col-12 justify-content-around">
                        <a class="btn boton2 col-11 col-sm-5 mt-3" href="../controlador/ctrVolverTienda.php">Volver</a>
                        <a class="btn boton2 col-11 col-sm-6 mt-3" href="../controlador/ctrVerFactura.php">Descargar Factura</a>
                    </div>
                </div>
            </main>

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
                                <p><a href="formulario.php"><i class="fas fa-align-justify me-3"></i>Rellena nuestro formulario</a></p>
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
            echo "AQUÍ?";
            header("location:../ctrTienda.php");
        }
    } else {
        header("location:../vista/index.php");
    }
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="../js/cerrarSesion.js"></script>
</body>
</html>