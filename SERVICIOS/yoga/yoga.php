<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header("Location: ../../LOGIN/formularioLogin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="yoga.css">
</head>

<body>

<!-- HEADER -->
<header>
    <div class="logo">
        <h1>N-FIT</h1>
        <p>Fuerza Intensidad Trabajo</p>
    </div>

    <nav>
        <a href="../../INICIO/index.php">Inicio</a>
        <a href="../servicios.php">Servicios</a>
        <a href="../../CONTACTO/contacto.php">Contacto</a>
        <a href="../../REGISTRO/formularioRegistro.php">Únete</a>
    </nav>

    <?php
      if (isset($_SESSION['usuario'])) {
        echo '<p class="bienvenido">Bienvenido, ' . $_SESSION['usuario'] . '</p>';
        echo '<a href="../LOGIN/logout.php"><button class="logout">CERRAR</button></a>';
        
      }
    ?>

</header>

<!-- MAIN -->




<main>

    <div>
        <h1>Yoga</h1>

        <p>
            El yoga es una disciplina perfecta para mejorar tu flexibilidad,
            reducir el estrés y fortalecer cuerpo y mente.
            Reserva tu clase seleccionando la fecha y la hora que prefieras.
        </p>

        

        <form action="reserva.php" method="POST">
            <h1>Horarios disponibles</h1>
            <input type="hidden" name="id_servicio" value="2">

            <label>Fecha:</label>
            <input type="date" name="fecha" required><br>

            <label>Hora:</label>
            <select name="hora" required>
                <option value="">Selecciona hora</option>
                <option value="09:00:00">09:00</option>
                <option value="11:00:00">11:00</option>
                <option value="17:00:00">17:00</option>
                <option value="19:00:00">19:00</option>
            </select><br>

            <button class="reservar">Reservar</button>
        </form>
    </div>

</main>


</body>
</html>


</main>

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
            <p>nfitsantiago <img src="../../IMAGENES/ig.png" width="30" height="30"></p>
        </div>
    </footer>

</body>
</html>
