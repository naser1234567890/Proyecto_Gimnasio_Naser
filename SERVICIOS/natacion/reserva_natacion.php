<?php
session_start();
include("../../CONEXION/conexion.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: ../../LOGIN/formularioLogin.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_usuario = $_SESSION['id_usuario'];  
    $id_servicio = $_POST['id_servicio'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

   
    $sql = "INSERT INTO reservas (id_usuario, id_servicio, fecha, hora, fecha_creacion)
            VALUES ('$id_usuario', '$id_servicio', '$fecha', '$hora', NOW())";

    if ($conn->query($sql) === TRUE) {
       $_SESSION['reserva_exitosa'] = "Se ha realizado la reserva con éxito.";
       header("Location: reserva_natacion.php");
       exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="natacion.css">
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
        <?php
            if (isset($_SESSION['usuario'])) {
                echo '<a href="../../RESERVAS/reservas.php">Reservas</a>';
            }
        ?>
    </nav>

    <?php
      if (isset($_SESSION['usuario'])) {
        echo '<p class="bienvenido">Bienvenido, ' . $_SESSION['usuario'] . '</p>';
        echo '<a href="../../LOGIN/logout.php"><button class="logout">CERRAR</button></a>';
        
      }
    ?>

</header>

<!-- MAIN -->
<main>
    <?php

    if (isset($_SESSION['reserva_exitosa'])) {
    ?>
        <div class="reserva-exitosa">
            <?= $_SESSION['reserva_exitosa']; ?>
        </div>
    <?php
        unset($_SESSION['reserva_exitosa']);
    }
    ?>

    <div class="mensaje-error"></div>

    <div class="contenedor">
        <h1>NATACIÓN</h1>

      <p>
            En las sesiones de natación nos enfocamos tanto en principiantes como en personas con experiencia.
            El entrenamiento combina técnica, respiración y acondicionamiento físico. <br><br>

            En las clases conseguirás:<br><br>
            <ul>
                <li>Mejorar la técnica de los estilos principales: crol, espalda, braza y mariposa.</li>
                <li>Fortalecer la espalda y corregir la postura.</li>
                <li>Aprender ejercicios de flotación, desplazamiento y coordinación.</li>
                <li>Disfrutar de un entrenamiento seguro y adecuado para cualquier edad.</li>
            </ul> 
        </p>

         <form class="reserva" action="reserva_natacion.php" method="POST">
            <h1>Horarios disponibles</h1>
            <input type="hidden" name="id_servicio" value="1">

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
            <p>nfitsantiago <img src="../../IMAGENES/ig.png" width="30" height="30"></p>
        </div>
    </footer>
    <script src="reserva.js" defer></script>
</body>
</html>

