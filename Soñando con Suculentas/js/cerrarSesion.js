if (hayUsuario) {

    function redireccion() {
        window.location.replace("../controlador/ctrCerrarSesion.php");
    }

    document.getElementById('botonCerrarSesion').addEventListener('click', cerrarSesion);
    
    function cerrarSesion() {
        Swal.fire({
            title: "¿Deseas cerrar sesión?",
            icon: 'question',
            background: 'rgb(253, 253, 253)',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Aceptar',
            customClass: {
                popup: 'ventanaConfirm'
            }       
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    text:'Has cerrado sesión',
                    icon: 'success',
                    showConfirmButton: false
                });
                setTimeout(redireccion, 1350);

            }
        })
    }
}



