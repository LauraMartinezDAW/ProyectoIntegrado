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
        <title>Modificar tipo de planta</title>
    </head>
<body>
<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION["admin"]) && isset($tipos)) {
        echo '<div class="container pb-2">
            <h1 class="letraCursiva text-center display-5 my-4 pt-3 colorVerde">Modificar tipo de planta</h1>
            <form id="modificarTipoPlanta" class="col-md-8 col-xl-4 mx-auto p-3 col-12" action="ctrModificarTipoPlanta.php" method="post">
                <label class="form-label">Tipos de planta</label>
                <select name="idTipoPlanta" class="form-select mb-3" aria-label="Tipos de planta">
                    
                    <option selected>Tipos de planta</option>';
                    
                    foreach ($tipos as $tipo) {   
                        echo '<option value="' . $producto->getIdTipoPlanta($tipo["NOMBRE_TIPO"]) . '">' . $tipo["NOMBRE_TIPO"] . '</option>';
                    }
                echo '</select>
                
                <label for="nombre" class="form-label">Nuevo nombre</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-list text-primary fw-bold"></i></span>
                    <input type="text" id="nombre" name="nombre" class="form-control" aria-label="Nuevo nombre del tipo de planta" aria-describedby="basic-addon1" required="">
                </div>

                <div class="mt-4 d-flex justify-content-around">
                    <input class="btn boton2" type="submit" value="Modificar">
                    <a href="../vista/administracion.php" class="btn boton2 px-4">Cancelar</a>
                </div>
            </form>
        </div>';

    } else {
        header("location:../vista/index.php"); 
    }



    
    ?>