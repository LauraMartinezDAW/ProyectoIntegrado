<?php

    // Llamada al modelo.
    require_once("../modelo/Usuario.php");

    $filtro = $_POST["filtro"];

    $usuario = new Usuario();

    $usuarios = $usuario->filtrarUsuarios($filtro);

    for ($i = 0; $i < count($usuarios); $i++) {
        
        echo '<table class="table table-primary table-striped table-hover table align-middle table-responsive-sm">
        <thead class="text-center table-dark">
        <th scope="col">Correo electrónico</th><th scope="col">Nombre</th><th scope="col">Apellidos</th><th scope="col">Dirección</th><th scope="col">Teléfono</th><th scope="col">Administrador</th><th scope="col" class="text-center">Acciones</th>
        </thead>';
        
        for ($i = 0; $i < count($usuarios); $i++) {
                echo '<tr>
                    <td class="text-center">' . $usuarios[$i]["EMAIL"] . '</td>
                    <td scope="row" class="text-center">' . $usuarios[$i]["NOMBRE_USUARIO"] . '</td>
                    <td class="text-center">' . $usuarios[$i]["APELLIDO1"] . " " . $usuarios[$i]["APELLIDO2"] . '</td>
                    <td class="text-center">' . $usuarios[$i]["DIRECCION"] . '</td>
                    <td class="text-center">' . $usuarios[$i]["TELEFONO"] . '</td>
                    <!--Si en el campo ADMINISTRADOR se recupera un 0, significa que no es un usuario administrador 
                    y se imprimirá un "No" en lugar del 0-->
                    <td class="text-center">' . (($usuarios[$i]["ADMINISTRADOR"] == 0) ? "No" : "Sí") . '</td>
                    <td class="text-center">
                        <form action="../controlador/ctrModificarUsuario.php" method="post">
                            <input type="submit" class="btn boton2 mb-1 mb-xl-0" value="Modificar">
                            <input type="hidden" name="email" value="' . $usuarios[$i]["EMAIL"] . '">
                        </form>
                    </td>
                </tr>'; 
            }  
        echo '</table>';
    }
?>