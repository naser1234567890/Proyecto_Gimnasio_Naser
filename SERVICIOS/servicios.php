<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="servicios.css">
</head>

<body>
    <!-- ENCABEZADO -->
    <header>
        <div class="logo">
            <h1>N-FIT</h1>
            <p>Fuerza Intensidad Trabajo</p>
        </div>

        <nav>
            <a href="../INICIO/index.php">Inicio</a>
            <a href="servicios.php">Servicios</a>
            <a href="../CONTACTO/contacto.php">Contacto</a>
            <a href="../REGISTRO/formularioRegistro.php">Únete</a>
            <?php
            if (isset($_SESSION['usuario'])) {
                echo '<a href="../RESERVAS/reservas.php">Reservas</a>';
            }
            ?>
        </nav>

        <?php
        if (isset($_SESSION['usuario'])) {
            echo '<p class="bienvenido">Bienvenido, ' . $_SESSION['usuario'] . '</p>';
            echo '<a href="../LOGIN/logout.php"><button class="logout"">CERRAR</button></a>';
        }
        ?>
    </header>


    <!-- MAIN -->
    <main>
        <div class="servicios">
            <div class="servicio">
                <h2>yoga</h2>
                <a href="yoga/reserva_yoga.php"><img src="../IMAGENES/yoga.jpg" alt="yoga"></a>
                <a href="yoga/reserva_yoga.php"><button class="reservar">Reservar</button></a>
            </div>
            <div class="servicio">
                <h2>hiit</h2>
                <a href="hiit/reserva_hiit.php"><img src="../IMAGENES/hiit.webp" alt="hiit"></a>
                <a href="hiit/reserva_hiit.php"><button class="reservar">Reservar</button></a>
            </div>
            <div class="servicio">
                <h2>natación</h2>
                <a href="natacion/reserva_natacion.php"><img src="../IMAGENES/natacion.jpg" alt="natacion"></a>
                <a href="natacion/reserva_natacion.php"><button class="reservar">Reservar</button></a>
            </div>
            <div class="servicio">
                <h2>zumba</h2>
                <a href="zumba/reserva_zumba.php"><img src="../IMAGENES/zumba.jpg" alt="zumba"></a>
                <a href="zumba/reserva_zumba.php"><button class="reservar">Reservar</button></a>
            </div>
        </div>
    </main>

    <hr>
    

    <!-- FOOTER -->
    <footer>
        <div>
            <h3>UBICACIÓN</h3>
            <p>Polígono Industrial do Tambre, Rúa das Hedras, 24, <br> Santiago de Compostela, A Coruña</p>
        </div>

        <div>
            <h3>HORARIO</h3>
            <p>Lunes a Viernes: 07:00 - 22:30<br>
                Sabados: 07:00 - 18:00<br>
                Domingos: 07:00 - 14:00</p>
        </div>

        <div>
            <h3>REDES SOCIALES</h3>
            <p>nfitsantiago <img src="../IMAGENES/ig.png" width="30" height="30"></p>
        </div>
    </footer>

</body>

</html>