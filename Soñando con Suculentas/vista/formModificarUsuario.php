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
    <!-- cdn de sweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Modificar Usuario</title>
</head>
<body>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION["admin"]) && isset($datosUsuario)) {
        
        echo '<div class="container pb-2">
            <h1 class="letraCursiva text-center display-5 mb-4 pt-3 colorVerde">Modificar usuario</h1>
            <form id="modificarUsuario" class="col-md-8 col-xl-4 mx-auto p-3 col-12" action="../controlador/ctrFormModificarUsuario.php" method="post" enctype="multipart/form-data">
                
                <label class="form-label">E-mail</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill text-primary"></i></span>
                    <input type="email" name="email" value="' . $datosUsuario["EMAIL"] . '" class="form-control" aria-label="Disabled mail" aria-describedby="basic-addon1" required="" disabled readonly>
                    <!-- Al estar deshabilitado el input de email, paso el valor por el campo oculto -->
                    <input type="hidden" name="emailUsuario" value="' . $datosUsuario["EMAIL"] . '">
                </div>

                <div class="input-group">    
                    <div class="col-12 mb-2">
                        <img src="' . $datosUsuario["FOTO_USUARIO"] . '" width="100px" alt="' . $datosUsuario["FOTO_USUARIO"] . '">
                        <input type="hidden" name="fotoActual" value="' . $datosUsuario["FOTO_USUARIO"] . '">
                    </div>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="text-muted mb-3">Formatos v??lidos: png, jpeg, jpg</div>

                <label for="password" class="form-label">Contrase??a</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-lock-fill text-primary"></i></span>
                    <input type="password" id="password" name="password" class="form-control" aria-label="Password" aria-describedby="basic-addon1">
                </div>
                
                <label for="nombre" class="form-label">Nombre</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-list text-primary fw-bold"></i></span>
                    <input type="text" id="nombre" name="nombre" value="' . $datosUsuario["NOMBRE_USUARIO"] . '" class="form-control" aria-label="Nombre del usuario" aria-describedby="basic-addon1" required="">
                </div>

                <label for="apellido1" class="form-label">Primer apellido</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text text-primary"></i></span>
                    <input type="text" id="apellido1" name="apellido1" value="' . $datosUsuario["APELLIDO1"] . '" class="form-control" aria-label="Apellidos" aria-describedby="basic-addon1">
                </div>

                <label for="apellido2" class="form-label">Segundo apellido</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text text-primary"></i></span>
                    <input type="text" id="apellido2" name="apellido2" value="' . $datosUsuario["APELLIDO2"] . '" class="form-control" aria-label="Apellidos" aria-describedby="basic-addon1">
                </div>

                <label for="direccion" class="form-label">Direcci??n</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text text-primary"></i></span>
                    <input type="text" id="direccion" name="direccion" value="' . $datosUsuario["DIRECCION"] . '" class="form-control" aria-label="Apellidos" aria-describedby="basic-addon1">
                </div>

                <label for="tlf" class="form-label">Tel??fono</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text text-primary"></i></span>
                    <input  type="tel" id="tlf" name="tlf" value="' . $datosUsuario["TELEFONO"] . '" class="form-control" aria-label="Apellidos" aria-describedby="basic-addon1">
                </div>

                <label class="form-check-label mt-2">Administrador</label>
                <input class="form-check-input mt-3 boton" type="checkbox" name="administrador"' . (($datosUsuario["ADMINISTRADOR"] == 0) ? false : "checked") . '>

                <div class="mt-4 d-flex justify-content-around">
                    <input class="btn boton2" type="submit" value="Modificar">
                    <a href="ctrModificarUsuario.php" class="btn boton2 px-4">Cancelar</a>
                </div>
            </form>
        </div>';
    } else {
        header("location:../vista/index.php");
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>