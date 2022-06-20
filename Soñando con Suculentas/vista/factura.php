<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- cdn para los iconos propios de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="http://<?php echo $_SERVER["HTTP_HOST"];?>/SonandoconSuculentas/css/style.css"/>
    <link rel="shortcut icon" href="../img/botanic.svg" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
                <div class="col-11 text-right">
                    <p class="font-weight-bold mb-1 fs-5">Soñando con Suculentas</p>
                    <p class="mb-1"><span class="font-weight-bold">CIF:</span> 12345678</p>
                    <p class=""><span class="font-weight-bold">Página web:</span> sonandoconsuculentas.great-site.net</p>
                </div>
            </section>
            <hr>

            <!-- Datos del cliente y de la factura-->
            <section class="row">
                <table>
                <tr>
                    <td>                
                        <div class="p-5">
                            <h6 class="fw-bold">Datos del cliente</h6>
                            <ul class="px-0">
                                <li class="mb-1"><?php echo $datosUsuario["EMAIL"] ?></li>
                                <li class="mb-1"><?php echo $datosUsuario["NOMBRE_USUARIO"] . ' ' . $datosUsuario["APELLIDO1"] . ' ' . $datosUsuario["APELLIDO2"] ?></li>
                                <li class="mb-1"><?php echo $datosUsuario["DIRECCION"] ?></li>
                                <li class="mb-1"></li>
                            </ul>
                        </div>
                    </td>

                    <td>                
                        <div class="p-5">
                            <h6 class="fw-bold"></h6>
                            <ul class="px-0">
                                <li class="mb-1"></li>
                                <li class="mb-1"></li>
                                <li class="mb-1"></li>
                                <li class="mb-1"></li>
                            </ul>
                        </div>
                    </td>

                    <td>
                        <div class="p-5 text-right">
                            <h6 class="fw-bold text-right">Datos de la factura</h6>
                            <ul class="px-0">
                                <li class="mb-1 text-right"><?php echo "Pedido nº " . $_SESSION["idPedido"] ?></li>                                
                                <li class="mb-1 text-right"><?php echo "Fecha del pedido " .  $_SESSION["fechaFactura"] ?></li>
                                <li class="mb-1 text-right"></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                </table>
            </section>
            <hr>

<!-- Productos -->
            <div class="row">
                <section class="mt-4 d-flex flex-column justify-content-center align-items-center">
                <?php
                    echo '<table class="table">
                    <thead class="text-center">
                        <th scope="col" colspan="3">Artículo</th><th scope="col">Precio</th><th scope="col">Cantidad</th><th scope="col">Total Artículo</th>
                    </thead>';
                    for ($i = 0; $i < count($cesta); $i++) {
                        echo '<tr>
                                <td class="text-center"><img src="http://' . $_SERVER["HTTP_HOST"] . '/SonandoconSuculentas' . $cesta[$i][0] . '" width="90px" alt="' . $cesta[$i][1] . '"></td>
                                    <td class="text-center">' . $cesta[$i][1] . '</td>
                                    <td class="text-center">' . $cesta[$i][4] . '</td>
                                    <td class="text-center">' . $cesta[$i][2] . '</td>
                                    <td class="text-center">' . $cesta[$i][3] . '</td>
                                    <td class="text-center">' . $cesta[$i][5] . '</td>
                                
                                </tr>'; 
                    }  
                    echo '</table>                                    
                </section>
            </div>
            <div class="row">
                <!-- Datos -->
                <section class="text-center flex-column align-items-center my-5">
                    <div id="datos" class="col-11 col-md-7 mb-4 d-flex flex-column">
                        <div class="col-12 border-bottom">
                            <p class="col-12 mb-0 d-inline text-left izquierda">Subtotal</p><p class="text-right mb-0 d-inline">' . $_SESSION["totalPedido"] .'€</p>
                        </div>
                        <div class="col-12 border-bottom">
                            <p class="col-12 mb-0 d-inline text-left izquierda">Envío</p><p class="text-right mb-0 d-inline">5€</p>
                        </div>
                        <div class="col-12 border-bottom">
                            <p class="col-12 mb-0 d-inline text-left izquierda">Total del pedido</p><p class="text-right mb-0 d-inline">' . ($_SESSION["totalPedido"] + 5) . '€</p>
                        </div>
                    </div>
                </section>
            </div>               
        </article>
    </div>'; 
    ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>