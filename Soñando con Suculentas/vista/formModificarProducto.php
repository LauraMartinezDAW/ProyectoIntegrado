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
    <title>Modificar Producto</title>
</head>
<body>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION["admin"]) && isset($datosProducto)) {
        
        echo '<div class="container pb-2">
            <h1 class="letraCursiva text-center display-5 mb-4 pt-3 colorVerde">Modificar producto</h1>
            <form id="modificarProducto" class="col-md-8 col-xl-4 mx-auto p-3 col-12" action="ctrFormModificarProducto.php" method="post" enctype="multipart/form-data">
                <!-- Mando el id del producto a través de un campo oculto-->
                <input type="hidden" name="idProducto" value="' . $datosProducto["ID_PRODUCTO"] . '">
                
                <label class="form-label">Foto actual</label>
                <div class="input-group">    
                    <div class="col-12 mb-2">
                        <img src="' . $datosProducto["FOTO"] . '" width="100px" alt="' . $datosProducto["FOTO"] . '">
                        <input type="hidden" name="fotoActual" value="' . $datosProducto["FOTO"] . '">
                    </div>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="text-muted mb-3">Formatos válidos: png, jpeg, jpg</div>
                
                <label for="nombre" class="form-label">Nombre</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-list text-primary fw-bold"></i></span>
                    <input type="text" id="nombre" name="nombre" value="' . $datosProducto["NOMBRE_CATEGORIA"] . ' ' . $datosProducto["NOMBRE_TIPO"] . '" class="form-control" aria-label="Nombre del usuario" aria-describedby="basic-addon1" disabled readonly>
                </div>

                <label for="desc" class="form-label">Descripción</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text text-primary"></i></span>
                    <textarea id="desc" name="desc" class="form-control" rows="6" aria-label="Descripcion" aria-describedby="basic-addon1" required>' 
                        . $datosProducto["DESCRIPCION"] .
                    '</textarea>
                </div>

                <label for="precio" class="form-label">Precio en euros</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text text-primary"></i></span>
                    <input type="number" id="precio" name="precio" min="1" step=".25" value="' . $datosProducto["PRECIO"] . '" class="form-control" aria-label="Precio" aria-describedby="basic-addon1" required>
                </div>

                
                <div class="row">
                    <div class="col-4 mb-3 me-4">
                    <label class="form-label">Tamaño actual</label>
                        <input type="text" value="' . $datosProducto["TAMANIO"] . '" class="form-control text-center" aria-label="Tamaño actual" aria-describedby="basic-addon1" disabled readonly>
                        <!-- Al estar deshabilitado el input del tamaño actual, paso el valor por el campo oculto -->
                        <input type="hidden" name="tamanioActual" value="' . $datosProducto["TAMANIO"] . '">
                    </div>
                    <div class="col-7 pe-0">
                        <label for="tamanio" class="form-label">Nuevo tamaño</label>
                        <select class="form-select mb-3 col-8" aria-label="Tamanio" name="tamanio">
                            <option selected>Tamaño de la planta</option>
                            <option value="S">Pequeña</option>
                            <option value="M">Mediana</option>
                            <option value="L">Grande</option>
                        </select>
                    </div>
                </div>
                <label for="stock" class="form-label">Stock</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text text-primary"></i></span>
                    <input  type="number" id="stock" name="stock" value="' . $datosProducto["STOCK"] . '" class="form-control" aria-label="Stock" aria-describedby="basic-addon1" required>
                </div>

                <div class="mt-4 d-flex justify-content-around">
                    <input class="btn boton2" type="submit" value="Modificar">
                    <a href="ctrModificarProducto.php" class="btn boton2 px-4">Cancelar</a>
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