
    let tabs = document.querySelectorAll(".accordion button");

    let botonEditaUsuario = document.getElementById("editarUsuarios");
    let botonEditaPagina = document.getElementById("editarPagina");
    let botonEditaAdministrador = document.getElementById("editarAdministrador");

    botonEditaUsuario.addEventListener("click", function() {
        tabs[0].click();
    });

    botonEditaPagina.addEventListener("click", function() {
        tabs[1].click();
    });

    botonEditaAdministrador.addEventListener("click", function() {
        tabs[2].click();
    });



