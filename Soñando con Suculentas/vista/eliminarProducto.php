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
        <link rel="shortcut icon" href="img/botanic.svg" type="image/x-icon" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Merienda:wght@400;700&display=swap"
            rel="stylesheet">
        <script src="https://kit.fontawesome.com/16f71d5ae1.js" crossorigin="anonymous"></script>
        <!-- cdn de sweetAlert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            function filtrar() {
                var filtro = document.getElementById("filtro").value;
                $.ajax({
                    url : "../filtros/buscadorElimProd.php",
                    method : "POST",
                    data : {filtro : filtro}
                }).done(function(listado) {
                    $("#listaProductos").html(listado);
                });
            }
        </script> 
        <title>Eliminar producto</title>
    </head>
<body>
    <?php
    if (isset($productos)) {
    echo '<h1 class="letraCursiva text-center display-5 mb-4 pt-3 colorVerde">Eliminar producto</h1>
        
        <div class="d-flex flex-column">           
            <div class="text-center my-5 row mx-auto">
                <div class="col-6 pe-0">
                    <label for="filtro" class="form-label">Buscar productos por nombre</label> 
                </div>
                <div class="col-6">
                    <input type="text" id="filtro" class="form-control" onkeyup="filtrar()">
                </div>
            </div>
            
                <div id="listaProductos" class="mx-auto d-flex justify-content-center px-0 px-md-1 px-lg-2">
                    <table class="table table-primary table-striped table-hover table align-middle table-responsive-sm">
                        <thead class="text-center table-dark">
                        <th scope="col" colspan="2">Producto</th><th scope="col">Tamaño</th><th scope="col">Precio</th><th scope="col">Stock</th><th scope="col" class="text-center">Acciones</th>
                        </thead>';
                        
                            foreach ($productos as $producto) {
                                echo '<tr>
                                    <td class="text-center">' . $producto["NOMBRE_CATEGORIA"] . " " . $producto["NOMBRE_TIPO"] . '</td>
                                    <td class="text-center"><img src="' . $producto["FOTO"] . '" width="90px" alt="' . $producto["FOTO"] . '"></td>
                                    <td class="text-center">' . $producto["TAMANIO"] . '</td>
                                    
                                    
                                    <td class="text-center">' . $producto["PRECIO"] . '</td>
                                    <td class="text-center">' . $producto["STOCK"] . '</td>
                                    <td class="text-center">
                                        <form action="../controlador/ctrEliminarProducto.php" method="post">
                                            <input type="submit" class="btn boton2 mb-1 mb-xl-0" value="Eliminar">
                                            <input type="hidden" name="idProducto" value="' . $producto["ID_PRODUCTO"] . '">
                                            <input type="hidden" name="idTipoPlanta" value="' . $producto["ID_TIPO"] . '">
                                            <input type="hidden" name="idCategoria" value="' . $producto["ID_CATEGORIA"] . '">
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