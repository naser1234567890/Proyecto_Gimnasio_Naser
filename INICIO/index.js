document.addEventListener('DOMContentLoaded', function() {
    const titulo = document.getElementById('textoAnimado');
    
    const frases = [ 
        "¡El DEPORTE, transforma tu vida!", 
        "ENTRENA INTELIGENTE", 
        "SUPERA TUS LÍMITES CADA DÍA", 
        "EL CAMBIO EMPIEZA HOY"
    ];
    let fraseActual = 0; 
    
    const tiempoTransicion = 900; 
    const tiempoEstatico = 4000; 
    const intervaloTotal = tiempoEstatico + tiempoTransicion; 

    
    function iniciarCambio() {
        titulo.textContent = frases[0];
        
        
        setInterval(cambiarFrase, intervaloTotal); 
    }

    
    function cambiarFrase() {
        titulo.style.opacity = 0;

        setTimeout(() => {
            fraseActual = (fraseActual + 1) % frases.length;
            titulo.textContent = frases[fraseActual];

            titulo.style.opacity = 1;
        }, tiempoTransicion); 
    }
    
    
    
    iniciarCambio(); 
});