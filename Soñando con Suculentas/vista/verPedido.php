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
        <!--Enlace a Ajax y jQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Tus pedidos</title>
    </head>
<body>
    <?php
    
    if (isset($pedidos)) {
        echo '<h1 class="letraCursiva text-center display-5 mb-4 pt-3 colorVerde">Tus pedidos</h1>';

        if (count($pedidos) == 0) {
            echo '<h2 class="letraCursiva text-center display-5 my-5 pt-3 ">No tienes pedidos</h2>
                <div class="text-center pb-2 mt-4">
                    <a href="../vista/perfil.php" class="btn boton2 px-5">Volver</a>
                </div>';
        } else {        
            
            echo '<div class="d-flex flex-column">                         
                <div class="mx-auto col-11 col-md-8 d-flex justify-content-center px-0 px-md-1 px-lg-2">
                    <table class="table table-primary table-striped table-hover table align-middle table-responsive-sm">
                        <thead class="text-center table-dark">
                        <th scope="col">Fecha del pedido</th><th scope="col" class="text-center">Factura</th>
                        </thead>';
                            foreach ($pedidos as $pedido) {
                                $fecha = strtotime($pedido["FECHA"]);
                                echo '<tr>
                                    <td class="text-center px-3">' . date("d-m-y", $fecha) . '</td>
                                    <td class="text-center px-3">
                                    
                                        <a href="' . $pedido["FACTURA"] .'" target="_blank" class="btn boton2 px-5">Ver factura</a> 
                                    </td>                                    
                                </tr>'; 
                            }  
                    echo '</table>
                </div>
            </div>
            <div class="text-center pb-2 mt-4">
                <a href="ctrVerPerfil.php" class="btn boton2 px-5">Volver</a>
            </div>';
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>