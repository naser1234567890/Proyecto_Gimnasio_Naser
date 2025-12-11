document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('form[action="contacto.php"]');

    if (form) {
        form.addEventListener("submit", function (e) {
            const nombre = document.getElementById("nombre").value.trim();
            const telefono = document.getElementById("telefono").value.trim();
            const email = document.getElementById("email").value.trim();
            const mensaje = document.getElementById("mensaje").value.trim();
            
            let errores = [];

            
            const soloLetras = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{5,}$/;
            if (!soloLetras.test(nombre)) {
                errores.push("El nombre debe contenr solo letras, mínimo 5 caracteres.");
            }

            
            const patronTelefono = /^\d{9,}$/;
            if (!patronTelefono.test(telefono)) {
                errores.push("Teléfono inválido (solo números, mínimo 9 dígitos).");
            }
            
           
            const patronEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!patronEmail.test(email)) {
                errores.push("Introduce un correo electrónico válido.");
            }

            
            if (mensaje.length < 10) {
                errores.push("El mensaje debe tener al menos 10 caracteres.");
            }

            if (errores.length > 0) {
                e.preventDefault();
                
                alert("Revisa  el formulario ❌:\n" + errores.join("\n"));
            }else {
                alert("Formulario enviado con éxito ✔️");
            }
        });
    }
});