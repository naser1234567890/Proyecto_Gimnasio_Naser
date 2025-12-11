document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('form.reserva');
    const errorDiv = document.querySelector('.mensaje-error');

    if (form && errorDiv) {
        
       
        function mostrarError(mensaje) {
            errorDiv.textContent = mensaje;
            errorDiv.style.display = 'block'; 
        }

       
        function ocultarError() {
            errorDiv.textContent = '';
            errorDiv.style.display = 'none'; 
        }

        form.addEventListener("submit", function (e) {
            ocultarError(); 

            const fecha = document.querySelector('input[name="fecha"]').value;
            const hora = document.querySelector('select[name="hora"]').value;

            
           
            const fechaSeleccionada = new Date(fecha);
            const hoy = new Date();
            
            
            hoy.setHours(0, 0, 0, 0); 
            
           
            if (fechaSeleccionada < hoy) {
                mostrarError("No puedes reservar para una fecha que ya ha pasado.");
                e.preventDefault();
                return;
            }

            
            const diaSemana = fechaSeleccionada.getDay();

           
            if (diaSemana === 0 || diaSemana === 6) {
                mostrarError("Las clases solo están disponibles de Lunes a Viernes.");
                e.preventDefault();
                return;
            }
        });
    }
});