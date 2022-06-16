
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- cdn para los iconos propios de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="http://<?php echo $_SERVER["HTTP_HOST"];?>/SonandoconSuculentas/css/bootstrap.css" rel="stylesheet"/>
    <link rel="stylesheet" href="http://<?php echo $_SERVER["HTTP_HOST"];?>/SonandoconSuculentas/css/style.css"/>
    <link rel="shortcut icon" href="../img/botanic.svg" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Merienda:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/16f71d5ae1.js" crossorigin="anonymous"></script>
    <!-- cdn de sweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Factura | Soñando con Suculentas</title>
</head>
<body>
    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $cesta = $_SESSION["cesta"];
    ?>

    <div id="contenedorFactura" class="container my-4 col-lg-7 border p-4">
        <h2 class="letraCursiva colorVerde text-center mt-3 mb-5 display-4">Tu factura</h2>
        <article class="col-11 mx-auto">
            <!-- Datos de la empresa -->
            <section class="row">
                <div class="col">
                    <p class="fw-bold text-end mb-1 fs-5">Soñando con Suculentas</p>
                    <p class="text-end mb-1"><span class="fw-bold">CIF:</span> 12345678</p>
                    <p class="text-end"><span class="fw-bold">Página web:</span> sonandoconsuculentas.great-site.net</p>
                </div>
            </section>
            <hr>

            <!-- Datos del cliente y de la factura-->
            <section class="row">
                <div class="col">
                    <h6 class="fw-bold">Datos del cliente</h6>
                    <ul class="px-0">
                        <li class="mb-1"><?php echo $datosCliente["EMAIL"] ?></li>
                        <li class="mb-1"><?php echo $datosCliente["NOMBRE_USUARIO"] . ' ' . $datosCliente["APELLIDO1"] . ' ' . $datosCliente["APELLIDO2"] ?></li>
                        <li class="mb-1"><?php echo $datosCliente["DIRECCION"] ?></li>
                        <li class="mb-1"></li>
                    </ul>
                </div>

                <div class="col">
                <h6 class="fw-bold text-end">Datos de la factura</h6>
                <ul class="px-0">
                        <li class="mb-1 text-end"><?php echo "Factura nº " . $datosCliente["EMAIL"] ?></li>
                        <li class="mb-1 text-end"><?php echo "Pedido " . $datosCliente["NOMBRE_USUARIO"] . ' ' . $datosCliente["APELLIDO1"] . ' ' . $datosCliente["APELLIDO2"] ?></li>
                        <li class="mb-1 text-end"><?php echo "Fecha del pedido " .  $datosCliente["DIRECCION"] ?></li>
                        <li class="mb-1 text-end"></li>
                    </ul>
                </div>
            </section>
            <hr>

            <!-- Productos -->
            <div class="row">
                <section class="mt-4 d-flex flex-column justify-content-center align-items-center">
                <?php
                    echo '<table class="table table-bordered">
                    <thead class="text-center">
                        <th scope="col" colspan="3">Artículo</th><th scope="col">Precio</th><th scope="col">Cantidad</th><th scope="col">Total Artículo</th>
                    </thead>';
                    for ($i = 0; $i < count($cesta); $i++) {
                        echo '<tr>
                                <td class="text-center"><img src="http://' . $_SERVER["HTTP_HOST"] . '/SonandoconSuculentas' . $cesta[$i][0] . '" width="90px" alt="' . $cesta[$i][1] . '"></td>
                                    <td class="text-center">' . $cesta[$i][1] . '</td>
                                    <td class="">' . $cesta[$i][4] . '</td>
                                    <td class="text-center">' . $cesta[$i][2] . '</td>
                                    <td class="">' . $cesta[$i][3] . '</td>
                                    <td class="">' . $cesta[$i][5] . '</td>
                                   
                                </tr>'; 
                    }  
                    echo '</table>                                    
                </section>
            </div>
            <div class="row">
                <!-- Datos -->
                <section class="d-flex justify-content-center flex-column align-items-center my-5">
                    <div class="col-11 col-md-7 mb-4 d-flex flex-column">
                        <div class="col-12 d-flex justify-content-between border-bottom ">
                            <p class="col-11 mb-0">Subtotal</p><p class="text-end mb-0">' . $_SESSION["totalPedido"] .'€</p>
                        </div>
                        <div class="col-12 d-flex justify-content-between border-bottom ">
                            <p class="col-11 mb-0">Envío</p><p class="text-end mb-0">5€</p>
                        </div>
                        <div class="col-12 d-flex justify-content-between border-bottom ">
                            <p class="col-11 mb-0">Total del pedido</p><p class="text-end mb-0">' . ($_SESSION["totalPedido"] + 5) . '€</p>
                        </div>
                    </div>
                </section>
            </div>               
        </article>
    </div>'; 
    ?>
</body>
</html>