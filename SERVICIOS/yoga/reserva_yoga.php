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
        $_SESSION['reserva_exitosa'] = "Reserva de Yoga realizada con éxito.";
        header("Location: reserva_yoga.php");
        exit;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Yoga</title>
    <link rel="stylesheet" href="yoga.css">
</head>

<body>

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
        <h1>YOGA</h1>

        <p>
            En nuestras clases de yoga trabajarás la flexibilidad, la movilidad articular y el control de la respiración,
            combinando posturas progresivas y técnicas de relajación. <br><br>

            A lo largo de cada sesión aprenderás a:<br><br>
            <ul>
                <li>Mejorar la postura corporal y liberar tensiones.</li>
                <li>Practicar respiración consciente y métodos de reducción del estrés.</li>
                <li>Aumentar tu fuerza funcional y tu concentración.</li>

            </ul> 
        </p>

        <form class="reserva" action="reserva_yoga.php" method="POST">
            <h1>Horarios disponibles</h1>

            <input type="hidden" name="id_servicio" value="1">

            <label>Fecha:</label>
            <input type="date" name="fecha" required><br>

            <label>Hora:</label>
            <select name="hora" required>
                <option value="">Selecciona hora</option>
                <option value="08:00:00">08:00</option>
                <option value="10:00:00">10:00</option>
                <option value="16:00:00">16:00</option>
                <option value="18:00:00">18:00</option>
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
