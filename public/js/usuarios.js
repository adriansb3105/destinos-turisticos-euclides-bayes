let errorLogin = document.getElementById("errorLogin");

if (localStorage.getItem("login")) {
    let loginForm = document.getElementById("loginForm");
    loginForm.style.display = "none";

    let contenedor = document.getElementById("contenedor");
    contenedor.innerHTML = `<button onclick="salir();" type="button" class="btn btn-primary">Salir</button>`;
}

function entrar() {
    let usuario = document.getElementById('usuario').value.valueOf();
    let contrasena = document.getElementById('contrasena').value.valueOf();

    if (usuario && contrasena) {
        $.ajax({
            type: "GET",
            url: `/api/administrador/${usuario}/${contrasena}`,
            success: function(data) {
                if (data == 'true') {
                    localStorage.setItem("login", "true");
                    window.location.href = "/administrador";
                } else {
                    errorLogin.innerHTML = `<label class="mt-2 red-color">Usuario o contraseña incorrectos</label>`;
                }
            }
        });
    }
}

function salir() {
    localStorage.removeItem("login");
    window.location.href = "/";
}