<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- cdn para los iconos propios de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="shortcut icon" href="../img/botanic.svg" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Merienda:wght@400;700&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/16f71d5ae1.js" crossorigin="anonymous"></script>
    <title>Cuidados | Soñando con Suculentas</title>
</head>

<body id="cuidados">
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
        }

    echo '<header class="mb-lg-5 mb-xl-5 mb-2">
        <div id="cabecera" class="d-flex justify-content-center align-items-center p-sm-5 p-lg-5 mb-3">
            <h1><a class="display-2 letraCursiva colorVerde" href="index.html">Soñando con Suculentas</a></h1>
        </div>
    </header>

    <!-- Migas de pan -->
    <div class="container-fluid">
        <nav aria-label="breadcrumb" class="px-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item ps-2"><a href="../index.php" class="migasPan">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <span class="migasPanActivo">Cuidados</span>
                </li>
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
                        <a class="nav-link fs-5 me-2" href="../index.php">Home</a>
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
                    </li>';
                
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
                            </script>";
                    }
                ?>
            </div>
        </div>
    </nav>

    <main>
        <h1 class="letraCursiva colorVerde text-center display-4 mt-5 mb-4">Cuidados de las suculentas</h1>
        <nav class="navbar navbar-expand navbar-light bg-light p-0 my-4">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul id="listaCuidados" class="navbar-nav">
                        <li class="nav-item mx-2 d-flex align-items-center">
                            <div class="btn-group">
                                <a role="button" href="#ubicacion" class="fs-5 me-1">Ubicación</a>
                                <!--Flechita para mostrar el submenú-->
                                <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                <!--Submenú-->
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#invierno">Ubicación en invierno</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#verano">Ubicación en verano</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link fs-5" href="#riego">Riego</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link fs-5" href="#sustrato">Sustrato</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid mx-auto p-0 bg-light">
            <p class="fs-5 col-md-11 px-4 mx-auto pt-4">
                Las plantas suculentas son, en general, plantas de fácil cuidado, que no necesitan que estemos
                pendientes de ellas a diario. Pero esto no
                quiere decir que no necesiten cuidados como cualquier ser vivo.
            </p>
            <p class="fs-5 col-md-11 px-4 mx-auto">
                En esta sección vamos a ver qué condiciones podemos darles a nuestras suculentas para un óptimo cuidado
                y crecimiento.
            </p>
            <section id="ubicacion" class="mt-4 mb-0 py-5">
                <div class="divParallax py-4 col-md-10 col-lg-7 mx-auto px-4 rounded">
                    <h2 class="letraCursiva colorVerde display-6 mt-4">Ubicación</h2>
                    <p class="fs-5 mb-4">La ubicación va a depender en gran medida de la climatología propia de la zona en la que
                        vivamos, ya que no se tienen las mismas temperaturas en Andalucía que en Galicia, por ejemplo.</p>
                    <h3 id="invierno" class="letraCursiva colorVerde">Ubicación en otoño, invierno y primavera</h3>
                    <p class="fs-5">
                        Por norma general, las suculentas podrán estar en su gran mayoría en un lugar donde dé el sol durante todo el día, en invierno. 
                    </p>
                    <p class="fs-5 mb-4">
                        En esta época habrá que tener especial cuidado con las lluvias y las heladas. Si nuestras plantas están en exterior, 
                        y vivimos en zonas con heladas, es conveniente utilizar mallas antihelada por la noche para evitar posibles quemaduras en las hojas.
                    </p>
                    <h3 id="verano" class="letraCursiva colorVerde">Ubicación en verano</h3>
                    <p class="fs-5 m-0">
                        Durante el verano hay que tener especial cuidado con la ubicación de nuestras plantas.
                    </p> 
                    <p class="fs-5">
                        En esta época del año, van a necesitar menos horas de sol directo, y habrá que tener especial cuidado con que no se quemen. 
                        Para ello, hay que evitar que les dé la luz solar durante las horas centrales del día.
                    </p>
                    <p class="fs-5">
                        La exposición ideal durante esta estación es que estén bajo el sol directo desde el amanecer hasta el mediodía aproximadamente
                        y después proporcionarles luz filtrada. 
                    </p>
                    <p class="fs-5">
                        Esto lo podemos conseguir de varias formas. Por ejemplo: teniéndolas bajo árboles, al lado de plantas más altas
                        que les proporcionen algo de sombra, con malla de sombreo, etc.
                    </p>
                </div>
            </section>
            <section id="riego" class="mb-0 py-5">
                <div class="divParallax py-4 col-md-10 col-lg-7 mx-auto px-4 rounded">
                    <h2 class="letraCursiva colorVerde display-6">Riego</h2>
                    <p class="fs-5">
                        Es uno de los aspectos más delicados de este tipo de plantas. Saber cómo regar suculentas correctamente 
                        no es una tarea menor. 
                    </p>
                    <p class="fs-5">
                        Podemos considerar que es la labor más importante de su cultivo ya que es, 
                        en realidad, la única que puede comprometer su bienestar. El exceso de riego suele ser la principal causa de muerte
                        de estas plantas. Así que, sólo por eso, bien merece la pena tomarse cierto tiempo para saber cómo regar suculentas.
                    </p>
                    <p class="fs-5">
                        Es importante comprender un aspecto. Las suculentas, sobre todo las plantas jóvenes, tienen raíces de poca profundidad. 
                        Éstas, al contacto con el agua, tienden a absorber la máxima cantidad posible. Un comportamiento lógico, dado que proceden 
                        de zonas desérticas. Sin embargo, esta capacidad de retención de agua es un arma de doble filo. 
                        Si se encuentran expuestas a demasiada agua, su mecanismo de absorción tratará de almacenarla igualmente. Y el exceso de 
                        agua sobrante lo único que hará será pudrir sus raíces.
                    </p>
                    <p class="fs-5">
                        Vayamos a la parte práctica. Cómo regar suculentas pasa por empapar en condiciones el sustrato en el que estén plantadas. 
                        Nada de andarnos con medias tintas: has leído bien, empapar. Sólo así las raíces de la planta podrán hidratarse 
                        y rellenar sus reservas.
                    </p>
                    <p class="fs-5">
                        Una pregunta habitual es cada cuánto tiempo hay que regar las suculentas. Esta pregunta tiene una respuesta sencilla: 
                        cuando el sustrato esté completamente seco. E insistimos: completamente seco. Hay que entender que esa sequía es positiva 
                        para estas plantas. Sólo durante ella, las suculentas comienzan a formar raíces nuevas y de buena envergadura. 
                        ¿Cuál es el motivo? Que, cuando vuelva a haber agua disponible, la planta pueda absorber más cantidad. 
                        Por eso, no tengas miedo de espaciar los riegos. Hacerlo permitirá a la planta crecer bajo tierra.
                    </p>
                </div>
            </section>
            <section id="sustrato" class="py-5">
                <div class="divParallax py-4 col-md-10 col-lg-7 mx-auto px-4 rounded">
                    <h2 class="letraCursiva colorVerde display-6">Sustrato</h2>
                    <p class="fs-5">
                        Hay una tendencia a cultivar suculentas en macetas o contenedores sin drenaje. 
                    </p>
                    <p class="fs-5">
                        Esto es una forma de cultivo que, aunque a nivel decorativo pueda funcionar, puede repercutir en negativo en el bienestar de estas plantas.
                        Tenerlas en este tipo de recipientes es posible, sin duda. Pero hacerlo supone varias cosas, y un trabajo extra. 
                    </p>
                    <p class="fs-5">
                        Por un lado, habrá que crearles una buena capa inferior de drenaje (con piedra volcánica, por ejemplo) que ayude a mantener 
                        el agua sobrante de riego alejado de las raíces. Esto también es recomendable hacerlo aunque la maceta que utilicemos tenga agujeros.
                        Por otro, habrá que tener un cuidado extra a la hora de regar para evitar
                        la pudrición de las raíces, por lo que no se podrá regar empapando el sustrato.
                        Lo ideal es proveer a nuestras suculentas de un buen drenaje. Es más: perdámosle el miedo a que nuestra maceta tenga 
                        agujeros. En realidad, cuantos más tenga mejor.
                    </p>
                    <p class="fs-5">
                        El sustrato que se puede utilizar puede ser una mezcla entre sustrato universal, perlita, y diferentes tipos de piedra, 
                        preferiblemente de origen volcánico. 
                        Se puede añadir también una pequeña cantidad de tierra de diatomeas, que es idónea para combatir plagas.
                    </p>
                    <p class="fs-5">
                        Finalmente, se recomienda poner una capa de piedra volcánica en la parte superior para que, a la hora de regar la planta, 
                        no se dañen las hojas o el tronco de la misma con la posible acumulación de humedad.
                    </p>
                </div>
            </section>
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
    </footer>

    <!-- Offcanvas iniciaSesion / Registro-->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="iniciaSesion" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header pb-2">
        <h3 class="offcanvas-title letraCursiva colorVerde">Inicia sesión</h3>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body pt-0">  
        <!-- Formulario de inicio de sesión -->
        <form action="../controlador/ctrIniciarSesion.php" method="POST" class="mb-5 pt-2 needs-validation" novalidate>
          <div class="mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="Escribe tu email" required>
            <div class="invalid-feedback">Debes introducir tu dirección de correo electrónico.</div>
          </div>
          
          <div class="mb-3">
              <input type="password" class="form-control" name="password" placeholder="Introduce tu contraseña..." required>
              <div class="invalid-feedback">Debes introducir tu contraseña.</div>
          </div>
          <div class="d-grid col-12">
            <input type="submit" class="btn text-center rounded-pill boton2" value="Iniciar sesión">
          </div>
        </form>

        <h5 class="letraCursiva colorVerde mt-5 mb-4">¿No tienes cuenta? <span class="display-6">¡Regístrate!</span></h5>
        <!-- Formulario de registro -->
        <form action="../controlador/ctrRegistroUsuario.php" method="post" class="needs-validation" novalidate>
          <div class="mb-3">
              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escribe un nombre de usuario." required>
              <div class="invalid-feedback">Nombre.</div>
          </div>
          <div class="mb-3">
              <input type="email" class="form-control" name="emailRegistro" id="email" placeholder="Introduce tu email." required>
              <div class="invalid-feedback">Introduce tu dirección de correo electrónico.</div>
          </div>
          <div class="mb-3">
              <input type="password" class="form-control strength_meter" name="password1" id="password" placeholder="Elige una contraseña." required>
              <div class="invalid-feedback">Debes introducir una contraseña.</div>
          </div>
          <div class="mb-3">
              <input type="password" class="form-control" name="password2" id="password2" placeholder="Escribe de nuevo tu contraseña." required>
              <div id="divContrasena2" class="invalid-feedback">Repite tu contraseña.</div>
          </div>
          <div class="d-grid col-12">
            <input id="inputRegistro" type="submit" class="btn text-center rounded-pill boton2" value="Registrarme">
          </div>
        </form>     
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
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
    </script>
</body>

</html>