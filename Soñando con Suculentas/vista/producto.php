<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- cdn para los iconos propios de Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link href="../css/bootstrap.css" rel="stylesheet"/>
        <link rel="stylesheet" href="../css/style.css"/>
        <link rel="shortcut icon" href="../img/botanic.svg" type="image/x-icon" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Merienda:wght@400;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/16f71d5ae1.js" crossorigin="anonymous"></script>
        <!-- cdn de sweetAlert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Producto | Soñando con Suculentas</title>
    </head>

    <body>
        <?php
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
                                <a class="nav-link fs-5 me-2" href="index.html">Home</a>
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
                            <script>
                                let hayUsuario = ' . isset($_SESSION["usuario"]). ';   
                                let esIndex = false;        
                            </script>

                        </div>
                    </div>
                </div>
            </nav>

            <!-- Migas de pan -->
            <div class="container-fluid mt-3 mb-5">
                <nav aria-label="breadcrumb" class="px-4">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item ps-2"><a href="../vista/index.php" class="migasPan">Home</a></li>
                        <li class="breadcrumb-item ps-2"><a href="ctrTienda.php" class="migasPan">Tienda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <span class="migasPanActivo">' . $productos["NOMBRE_CATEGORIA"] . ' ' . $productos["NOMBRE_TIPO"] . '</span>
                        </li>
                    </ol>
                </nav>
            </div>

            <!-- Contenido principal -->
            <main>           
                <div class="container mb-4">

                    <article>
                        <!-- Producto -->
                        <div class="row">
                            <section class="mt-4 d-flex justify-content-center">
                                <div class="card mb-3 col-md-11">
                                    <div id="tarjetaProducto" class="row g-0 justify-content-center">
                                        <div class="col-xl-4">
                                            <img src="'. $productos["FOTO"] . '" class="img-fluid rounded-start" alt="' . $productos["NOMBRE_TIPO"] . '">
                                        </div>
                                        <div class="col-lg-10 col-xl-8 d-flex align-items-center justify-content-center">
                                            <div class="card-body text-center px-xl-5 py-0 ">
                                                <h3 class="card-title text-center colorVerde mt-2">' .  $productos["NOMBRE_CATEGORIA"] . ' ' . $productos["NOMBRE_TIPO"] . ' ' . $productos["TAMANIO"] . '</h3>
                                                <p class="card-text my-xxl-2 my-0">' . $productos["DESCRIPCION"] . '</p>
                                                <form action="ctrAgregarCesta.php" method="post">
                                                    <div class="col-2 mx-auto">';
                                                        if ($productos["STOCK"] != 0) {
                                                            echo '<select name="cantidad" class="form-select mt-4" aria-label="Cantidad">                                                              
                                                                <option selected>Cantidad</option>';
                                                                for ($i = 0; $i < $productos["STOCK"]; $i++) {
                                                                    $cant = $i + 1;
                                                                    echo '<option value="' . $cant . '">' . $cant . '</option>';
                                                                }
                                                            echo '</select>
                                                    </div>
                                                    <input type="hidden" name="idProducto" value="' . $productos["ID_PRODUCTO"] . '">
                                                    <button class="btn col-5 mb-1 mb-xxl-3 boton2 fs-6 mt-xxl-4" type="submit">Comprar</button>';
                                                        } else {
                                                            echo '<p class="letraCursiva text-muted fs-4">Sin stock</p>';
                                                        }
                                                echo '</form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <!-- Valoraciones -->
                        <div class="row">
                            <section class="d-flex justify-content-center flex-column align-items-center my-5">';  
                                if ($comentarios) {
                                    echo '<h2 class="letraCursiva colorVerde text-center my-3 display-5">Valoraciones</h2>';
                                    
                                    foreach ($comentarios as $comentario) {
                                        echo '<div class="col-md-7 mb-4">
                                            <div class="card">
                                                <div class="row g-0">
                                                    <div class="col-3">
                                                    <img src="' . $comentario["FOTO_USUARIO"] . '" class="img-fluid" alt="foto de usuario">
                                                    </div>
                                                    <div class="col-9 comentario">
                                                            <div class="card-body">
                                                                <h5 class="card-title text-muted">'. $comentario["NOMBRE_USUARIO"] . ' ' . $comentario["APELLIDO1"] . '</h5>
                                                                <p class="card-text">' . $comentario["CONTENIDO"] . '</p>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                } else {
                                    echo '<h2 class="letraCursiva colorVerde text-center my-3 display-5">Todavía no hay valoraciones</h2>';
                                }
                            echo '</section>
                        </div>

                        <!--Enviar comentario-->
                        <section class="d-flex justify-content-center flex-column align-items-center my-3">
                            <h2 class="letraCursiva colorVerde text-center mt-4">Déjanos tu comentario</h2>
                            <form action ="ctrEnviarComentario.php" method="post" id="valoracion" class="d-flex flex-column col-lg-5 py-4 needs-validation" novalidate>        
                                <div class="my-2 col-10 mx-auto">
                                    <textarea class="form-control" name="textArea" id="textArea" cols="60" rows="5" placeholder="Escribe aquí tu mensaje" minlength="10" required></textarea>
                                    <div id="invalid-val" class="invalid-feedback">Debes escribir una valoración de al menos 10 caracteres.</div>
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
                                <button id="botonComentario" class="btn col-7 mx-auto my-3 boton2" type="submit">Enviar</button>
                                <input type="hidden" name="nombre" value="' . $_SESSION["usuario"] . '">
                                
                                <input type="hidden" name="id_producto" value="' . $idProducto . '">
                                
                            </form>
                        </section>
                    </div>

                    </article>
                </div>
            </main>';
        ?>
        <script src="../js/cerrarSesion.js"></script>
    </body>
</html>