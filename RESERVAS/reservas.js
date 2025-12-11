document.addEventListener('DOMContentLoaded', function () {

    const filtro = document.getElementById('filtroReserva');
    const filas = document.querySelectorAll('.filas');


    filtro.addEventListener('keyup', function () {

        const textoBusqueda = filtro.value.toLowerCase();


        filas.forEach(fila => {

            const nombreActividad = fila.children[0].textContent.toLowerCase();


            if (nombreActividad.includes(textoBusqueda)) {

                fila.style.display = '';
            } else {

                fila.style.display = 'none';
            }
        });
    });
});