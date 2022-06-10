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
    <title>Agregar un producto</title>
</head>
<body>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION["admin"])) {
        echo '<div class="container pb-2">
            <h1 class="letraCursiva text-center display-5 mb-4 pt-3 colorVerde">Agregar producto</h1>
            <form id="agregarProducto" class="col-md-8 col-xl-4 mx-auto p-3 col-12" action="../controlador/ctrAgregarProducto.php" method="post" enctype="multipart/form-data">

                <label for="categoria" class="form-label">Categoría</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-tag text-primary"></i></span>
                    <input type="text" id="categoria" name="categoria" class="form-control" placeholder="Categoría de la planta" aria-label="Categoria" aria-describedby="basic-addon1" required="">
                </div>
                
                <label for="tipoPlanta" class="form-label">Tipo de planta</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text text-primary"></i></span>
                    <input type="text" id="tipoPlanta" name="tipoPlanta" class="form-control" placeholder="Tipo de la planta" aria-label="Tipo de la planta" aria-describedby="basic-addon1" required="">
                </div>

                <label class="form-label">Fotografía</label>
                <div class="input-group mb-1">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-image text-primary"></i></span>
                    <input type="file" name="foto" class="form-control" required="">
                </div>
                <div class="text-muted mb-3">Formatos válidos: png, jpeg, jpg</div>

                <label for="precio" class="form-label">Precio</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-euro text-primary fw-bold"></i></span>
                    <input type="number" id="precio" name="precio" class="form-control" min="1" step=".25" placeholder="Precio del producto" aria-label="Precio" aria-describedby="basic-addon1" required="">
                </div>

                <label for="descripcion" class="form-label">Descripción</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-text text-primary"></i></span>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="5" placeholder="Descripción de la nueva planta" aria-label="Descripcion" aria-describedby="basic-addon1" required></textarea>
                </div>

                <select class="form-select mb-3" aria-label="Tamanio" name="tamanio">
                    <option selected>Tamaño de la planta</option>
                    <option value="S">Pequeña</option>
                    <option value="M">Mediana</option>
                    <option value="L">Grande</option>
                </select>

                <label for="stock" class="form-label">Stock del producto</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-box-seam text-primary"></i></span>
                    <input  type="number" id="stock" name="stock" min="1" class="form-control" placeholder="Número de plantas disponibles" aria-label="Stock" aria-describedby="basic-addon1" required>
                </div>

                <div class="mt-4 d-flex justify-content-around">
                    <input class="btn boton2" type="submit" value="Agregar planta">
                    <a href="administracion.php" class="btn boton2 px-4">Cancelar</a>
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