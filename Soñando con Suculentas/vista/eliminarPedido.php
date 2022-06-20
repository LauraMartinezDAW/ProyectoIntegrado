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
        <script>
            function filtrar() {
                var filtro = document.getElementById("filtro").value;
                $.ajax({
                    url : "../filtros/buscadorElimPed.php",
                    method : "POST",
                    data : {filtro : filtro}
                }).done(function(listado) {
                    $("#listaPedidos").html(listado);
                });
            }
        </script> 
        <title>Gestionar Pedido</title>
    </head>
<body>
    <?php
    
    if (isset($pedidos)) {
        echo '<h1 class="letraCursiva text-center display-5 mb-4 pt-3 colorVerde">Gestionar Pedido</h1>';

        if (count($pedidos) == 0) {
            echo '<h2 class="letraCursiva text-center display-5 my-5 pt-3 ">Todavía no hay pedidos</h2>
                <div class="text-center pb-2 mt-4">
                    <a href="../vista/administracion.php" class="btn boton2 px-5">Volver</a>
                </div>';
        } else {        
            echo '<div class="d-flex flex-column">           
                    <div class="text-center my-5 row mx-auto">
                        <div class="col-6 pe-0">
                            <label for="filtro" class="form-label">Buscar pedidos por usuario</label> 
                        </div>
                        <div class="col-6">
                            <input type="text" id="filtro" class="form-control" onkeyup="filtrar()">
                        </div>
                    </div>
                
                    <div id="listaPedidos" class="mx-auto d-flex justify-content-center px-0 px-md-1 px-lg-2">
                        <table class="table table-primary table-striped table-hover table align-middle table-responsive-sm">
                            <thead class="text-center table-dark">
                            <th scope="col">ID de pedido</th><th scope="col">Usuario</th><th scope="col">Factura</th><th scope="col">Fecha del pedido</th><th scope="col" class="text-center">Acciones</th>
                            </thead>';
                            
                                foreach ($pedidos as $pedido) {
                                    echo '<tr>
                                        <td class="text-center px-3">' . $pedido["ID_PEDIDO"] . '</td>
                                        <td class="text-center px-3">' . $pedido["EMAIL_USUARIO"] . '</td>
                                        <td class="text-center px-3">
                                            <a href="' . $pedido["FACTURA"] .'" target="_blank" class="btn boton2 px-5">Ver factura</a> 
                                        </td>
                                        <td class="text-center px-3">' . $pedido["FECHA"] . '</td>
                                        <td class="text-center px-3">
                                            <form action="../controlador/ctrEliminarPedido.php" method="post">
                                                <input type="submit" class="btn boton2 mb-1 mb-xl-0" value="Eliminar">
                                                <input type="hidden" name="idPedido" value="' . $pedido["ID_PEDIDO"] . '">
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
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>