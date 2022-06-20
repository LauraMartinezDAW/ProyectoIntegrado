<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- cdn para los iconos propios de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="shortcut icon" href="img/botanic.svg" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Merienda:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/16f71d5ae1.js" crossorigin="anonymous"></script>
    <!-- cdn de sweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Links necesarios para la comprobación de la contraseña -->
    <link rel="stylesheet" href="pass-strength/dist/css/passtrength.css">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="pass-strength/src/jquery.passtrength.js"></script>
    <title>Soñando con Suculentas</title>
  </head>
  <body>
    <?php
      if (session_status() == PHP_SESSION_NONE) {
          session_start();
      }
    // Si hay usuario en la sesión
      if (isset($_SESSION["usuario"])) {
        // Guardo el nombre de usuario
        $usuario = $_SESSION["usuario"];

        echo '<script>let esIndex = true;</script>';

        // Guardo
        /* $_SESSION["fechaSesion"] = date("j-n-Y H:i:s"); 
        echo "FECHA Y HORA INICIO SESION " . $_SESSION["fechaSesion"];*/

        // Deshabilito el offcanvas de inicio de sesión / registro
        $bsTarjet = "";
        // Habilito el enlace al perfil de usuario
        $href = "controlador/ctrVerPerfil.php";

      } else {
        $usuario = "Inicia sesión";
        $bsTarjet = "#iniciaSesion";
        $href = "";
      }
    ?>

    <header class="mb-lg-5 mb-xl-5 mb-2">
      <div id="cabecera" class="d-flex justify-content-center align-items-center p-sm-5 p-lg-5 mb-3">
        <h1 class="display-2 letraCursiva colorVerde">Soñando con Suculentas</h1>
      </div>
    </header>

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
                <a class="nav-link fs-5 me-2" href="vista/cuidados.php#ubicacion">Ubicación</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fs-5 me-2" href="vista/cuidados.php#riego">Riego</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fs-5 me-2" href="vista/cuidados.php#sustrato">Sustrato</a>    
            </li>
            <li class='nav-item'>
              <a class='nav-link fs-5' href='vista/#contactoFooter'>Contacto</a>    
            </li>
            <?php

              if (isset($_SESSION["usuario"])) {
                echo "<li class='nav-item'>
                      <a class='nav-link fs-5' href='controlador/ctrTienda.php'>Tienda</a>    
                    </li>";

                if (isset($_SESSION["admin"])) {
                  echo "<li class='nav-item'>
                        <a class='nav-link fs-5' href='vista/administracion.php'>Administración</a>    
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
      </div>
    </nav>
      
    <main>
      <section>
        <div class="container mb-4">
          <!-- Fila 1 -->
          <div class="row">
            <article>
                <h1 class="my-4 letraCursiva colorVerde">¿Qué son las plantas suculentas?</h1>
                <p class="fs-5">Las plantas suculentas o crasas son aquellas en las que algún órgano está especializado en el almacenamiento de agua en cantidades mayores que las plantas sin esta adaptación. Estos órganos de reserva tienen una alta proporción de tejido <span class="text-info" title="tejidos encargados de la nutrición del vegetal">parenquimático</span>. Su adaptación les permite mantener reservas de agua durante períodos prolongados, y sobreviven a los largos períodos de sequía en climas áridos.</p>

                <p class="fs-5">La adaptación de las suculentas les permite colonizar entornos áridos o en los que la captación de agua es limitada. Para posibilitar la captación de la escasa humedad presente en el ambiente, muchas suculentas son pubescentes, es decir, presentan una superficie cubierta de pelillos que retienen el rocío matutino. Otras técnicas empleadas para maximizar la retención de la humedad son la limitación del número de ramificaciones y la longitud de estas, así como el desarrollo de recubrimientos <span class="text-info" title="La pruina, también conocida como cera epicuticular, es un protector natural para nuestras suculentas con aspecto de polvillo blanquecino">pruinosos</span> en la superficie de hojas y tallos.</p>

                <p class="fs-5">Los cactus presentan las hojas modificadas como espinas y los tallos suculentos y fotosintéticos.</p>
                <p class="fs-5">Hay miles de especies de suculentas, clasificadas en varias familias.</p>
              </article>
          </div>
          

          <!-- Fila 2 -->
          <article>
            <h2 class="my-4 letraCursiva colorVerde display-6">Familias</h2>
            <p class="text-justify fs-5">Estas son las principales familias de las plantas suculentas.</p>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
              <div class="col">
                <div class="card p-0">
                  <div class="card-body">
                    <h5 class="card-title text-center">Agavaceae</h5>
                  </div>
                  <div class="div-img">
                    <img src="img/agave.jpg.webp" class="card-img-top" alt="Agave potatorum">
                  </div>
                  <h6 class="card-subtitle mt-2 text-muted pb-2 ps-2">Agave potatorum</h6>
                </div>
              </div>

              <div class="col">
                <div class="card p-0">
                  <div class="card-body">
                    <h5 class="card-title text-center">Aizoaceae</h5>
                  </div>
                  <div class="div-img">
                    <img src="img/Lithops-karasmontana.jpg" class="card-img-top" alt="Lithops karasmontana">
                  </div>
                  <h6 class="card-subtitle mt-2 text-muted pb-2 ps-2">Lithops karasmontana</h6>
                </div>
              </div>

              <div class="col">
                <div class="card p-0">
                  <div class="card-body">
                    <h5 class="card-title text-center">Apocynaceae</h5>
                  </div>
                  <div class="div-img">
                    <img src="img/orbea.jpg" class="card-img-top" alt="Orbea variegata">
                  </div>
                  <h6 class="card-subtitle mt-2 text-muted pb-2 ps-2">Orbea variegata</h6>
                </div>
              </div>

              <div class="col">
                <div class="card p-0">
                  <div class="card-body">
                    <h5 class="card-title text-center">Asphodelaceae</h5>
                  </div>
                  <div class="div-img">
                    <img src="img/haworthia_coarctata2.jpg" class="card-img-top" alt="Haworthia coarctata">
                  </div>
                  <h6 class="card-subtitle mt-2 text-muted pb-2 ps-2">Haworthia coarctata</h6>
                </div>
              </div>

              <div class="col">
                <div class="card p-0">
                  <div class="card-body">
                    <h5 class="card-title text-center">Cactaceae</h5>
                  </div>
                  <div class="div-img">
                    <img src="img/gymnocalycium-mihanovichii.jpg" class="card-img-top" alt="Gymnocalycium mihanovichii">
                  </div>
                  <h6 class="card-subtitle mt-2 text-muted pb-2 ps-2">Gymnocalycium mihanovichii</h6>
                </div>
              </div>

              <div class="col">
                <div class="card p-0">
                  <div class="card-body">
                    <h5 class="card-title text-center">Crassulaceae</h5>
                  </div>
                  <div class="div-img">
                    <img src="img/graptopetalum-superbum.jpg" class="card-img-top" alt="Graptopetalum superbum">
                  </div>
                  <h6 class="card-subtitle mt-2 text-muted pb-2 ps-2">Graptopetalum superbum</h6>
                </div>
              </div>

              <div class="col">
                <div class="card p-0">
                  <div class="card-body">
                    <h5 class="card-title text-center">Euphorbiaceae</h5>
                  </div>
                  <div class="div-img">
                    <img src="img/Euphorbia-lactea-White-Ghost.jpg" class="card-img-top" alt="Euphorbia lactea 'White Ghost'">
                  </div>
                  <h6 class="card-subtitle mt-2 text-muted pb-2 ps-2">Euphorbia lactea 'White Ghost'</h6>
                </div>
              </div>

              <div class="col">
                <div class="card p-0">
                  <div class="card-body">
                    <h5 class="card-title text-center">Portulacaceae</h5>
                  </div>
                  <div class="div-img">
                    <img src="img/portulaca-gilliesii.jpg" class="card-img-top" alt="Portulaca gilliesii">
                  </div>
                  <h6 class="card-subtitle mt-2 text-muted pb-2 ps-2">Portulaca gilliesii</h6>
                </div>
              </div>
            </div>
          </div>         
          </article>
          
      </section>
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
        <form action="controlador/ctrIniciarSesion.php" method="POST" class="mb-5 pt-2 needs-validation" novalidate>
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
        <form action="controlador/ctrRegistroUsuario.php" method="post" class="needs-validation" novalidate>
          <div class="mb-3">
              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escribe un nombre de usuario." required>
              <div class="invalid-feedback">Nombre.</div>
          </div>
          <div class="mb-3">
              <input type="email" class="form-control" name="emailRegistro" id="email" placeholder="Introduce tu email." required>
              <div class="invalid-feedback">Introduce tu dirección de correo electrónico.</div>
          </div>
          <div class="mb-3">
              <input type="password" class="form-control strength_meter" name="password1" id="password" placeholder="Elige una contraseña." minlength="6" required>
              <div class="invalid-feedback">Debes introducir una contraseña.</div>
              <div class="text-muted mb-3">Debe tener como mínimo 6 caracteres. Debe incluir un número, letra mayúscula y minúscula y un carácter especial ! % & @ # $ ^ * ? _ ~</div>
          </div>
          <div class="mb-3">
              <input type="password" class="form-control" name="password2" id="password2" placeholder="Escribe de nuevo tu contraseña." minlength="6" required>
              <div id="divContrasena2" class="invalid-feedback">Repite tu contraseña.</div>
          </div>
          <label id="mensaje_error" class="control-label col-md-12 text-success" style="display: block;">Las constraseñas sí coinciden</label>
          <div class="d-grid col-12">
            <input id="inputRegistro" type="submit" class="btn text-center rounded-pill boton2" value="Registrarme">
          </div>
        </form>
      </div>                                                        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="js/cerrarSesion.js"></script>
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
