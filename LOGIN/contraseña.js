document.addEventListener("DOMContentLoaded", function() {
    const password = document.getElementById("password");
    
    
    const botonCambiar = document.getElementById("alternarContrasena"); 

    if (password && botonCambiar) {
        botonCambiar.addEventListener("click", function() {
            
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
           
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    }
});