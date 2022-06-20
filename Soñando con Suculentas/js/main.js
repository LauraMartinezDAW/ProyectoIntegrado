    let tabs = document.querySelectorAll(".accordion button");
    
    let botonEditaUsuario = document.getElementById("editarUsuarios");
    let botonEditaPagina = document.getElementById("editarPagina");
    let botonGestionarPedidos = document.getElementById("gestionarPedidos");



//******* Administración *******//

    botonEditaUsuario.addEventListener("click", function() {
        tabs[0].click();
    });

    botonEditaPagina.addEventListener("click", function() {
        tabs[1].click();
    });

    botonGestionarPedidos.addEventListener("click", function() {
        tabs[2].click();
    });



