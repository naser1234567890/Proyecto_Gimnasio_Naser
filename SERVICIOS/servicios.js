

document.addEventListener("DOMContentLoaded", function() {
    
    const tarjetas = document.querySelectorAll('.tarjeta-giratoria');
    
    tarjetas.forEach(tarjeta => {
        tarjeta.addEventListener('click', function() {
           
            this.classList.toggle('girada');
        });
    });
});