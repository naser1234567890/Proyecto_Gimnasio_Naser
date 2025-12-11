document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("formRegistro");

    form.addEventListener("submit", function (e) {
        const nombre = document.getElementById("nombre").value.trim();
        const usuario = document.getElementById("usuario").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();
        const mensaje = document.getElementById("mensaje");

        mensaje.innerHTML= "";
        
        const soloLetras = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{10,}$/;
        
        if (!soloLetras.test(nombre)) {
            mensaje.innerHTML= "El nombre debe contener al menos 10  caracteres, solo letras";
            e.preventDefault();
            return;
        }
        if (usuario.length < 5 ) {
            mensaje.innerHTML= "El usuario debe tener  al menos 5 caracteres";
            e.preventDefault();
            return;
        }       
        const patronEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!patronEmail.test(email)) {
            mensaje.innerHTML= "Introduce un correo electrónico válido";
            e.preventDefault();
            return;
        }  
        const patronPassword= /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

        if (!patronPassword.test(password)) {
            mensaje.innerHTML= "La contraseña debe tener mayúsculas  minúsculas, números y mínimo 8 caracteres";
            e.preventDefault();
            return;
        }
    });
});
