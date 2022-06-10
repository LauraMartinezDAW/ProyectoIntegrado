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
        <title>Modificar usuario</title>
    </head>
<body>
    <?php
    if (isset($usuarios)) {
    echo '<h1 class="letraCursiva text-center display-5 mb-4 pt-3 colorVerde">Modificar usuario</h1>
        
        <div class="d-flex flex-column">           
            <div class="text-center my-5">
                Filtrar usuarios por nombre / apellidos que contengan 

                <input type="text" id="filtro" onkeyup="filtrar()">
            </div>
            
                <div id="listaUsuarios" class="mx-auto d-flex justify-content-center px-0 px-md-1 px-lg-2">
                    <table class="table table-primary table-striped table-hover table align-middle table-responsive-sm">
                        <thead class="text-center table-dark">
                        <th scope="col">Correo electrónico</th><th scope="col">Nombre</th><th scope="col">Apellidos</th><th scope="col">Dirección</th><th scope="col">Teléfono</th><th scope="col">Administrador</th><th scope="col" class="text-center">Acciones</th>
                        </thead>';
                        
                            foreach ($usuarios as $usuario) {
                                echo '<tr>
                                    <td class="text-center">' . $usuario["EMAIL"] . '</td>
                                    <td scope="row" class="text-center">' . $usuario["NOMBRE_USUARIO"] . '</td>
                                    <td class="text-center">' . $usuario["APELLIDO1"] . " " . $usuario["APELLIDO2"] . '</td>
                                    <td class="text-center">' . $usuario["DIRECCION"] . '</td>
                                    <td class="text-center">' . $usuario["TELEFONO"] . '</td>
                                    <!--Si en el campo ADMINISTRADOR se recupera un 0, significa que no es un usuario administrador 
                                    y se imprimirá un "No" en lugar del 0-->
                                    <td class="text-center">' . (($usuario["ADMINISTRADOR"] == 0) ? "No" : "Sí") . '</td>
                                    <td class="text-center">
                                        <form action="../controlador/ctrModificarUsuario.php" method="post">
                                            <input type="submit" class="btn boton2 mb-1 mb-xl-0" value="Modificar">
                                            <input type="hidden" name="email" value="' . $usuario["EMAIL"] . '">
                                        </form>
                                    </td>
                                </tr>'; 
                            }  
                    echo '</table>
                </div>
            </div>
            <div class="text-center pb-2 mt-4">
                <a href="../vista/administracion.php" class="btn boton2 px-5">Volver</a>
            </div>';
            }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>