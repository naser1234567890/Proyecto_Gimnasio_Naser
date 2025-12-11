document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById("password");
    
    
    const toggleButton = document.getElementById("alternarContrasena"); 

    if (passwordInput && toggleButton) {
        toggleButton.addEventListener("click", function() {
            
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);
            
           
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    }
});