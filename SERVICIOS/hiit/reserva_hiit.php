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

    // Obtener día de la semana (1=lunes ... 7=domingo)
    $diaSemana = date("N", strtotime($fecha));

    // Validar día (solo lunes a viernes)
    if ($diaSemana < 1 || $diaSemana > 5) {
    $_SESSION['error_reserva'] = "Las clases solo están disponibles de lunes a viernes.";
    header("Location: reserva_hiit.php");
    exit;
}

    // Insertar reserva
    $sql = "INSERT INTO reservas (id_usuario, id_servicio, fecha, hora, fecha_creacion)
            VALUES ('$id_usuario', '$id_servicio', '$fecha', '$hora', NOW())";

    if ($conn->query($sql) === TRUE) {
       $_SESSION['reserva_exitosa'] = "Se ha realizado la reserva con éxito.";
       header("Location: reserva_hiit.php");
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
    <link rel="stylesheet" href="hiit.css">
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

        if (isset($_SESSION['error_reserva'])) {
        ?>
            <div class="mensaje-error">
                <?= $_SESSION['error_reserva']; ?>
            </div>
        <?php
            unset($_SESSION['error_reserva']);
        }

        if (isset($_SESSION['reserva_exitosa'])) {
        ?>
            <div class="reserva-exitosa">
                <?= $_SESSION['reserva_exitosa']; ?>
            </div>
        <?php
            unset($_SESSION['reserva_exitosa']);
        }
        ?>
    <div class="contenedor">
        <h1>HIIT</h1>

      <p>
            Las clases de HIIT están diseñadas para quienes quieren un entrenamiento dinámico, rápido y muy efectivo.
            Durante la sesión realizarás intervalos cortos de ejercicios intensos, 
            combinados con descansos breves para mantener el ritmo. <br><br>

            En cada clase podrás:<br><br>
            <ul>
                <li>Quemar una gran cantidad de calorías en poco tiempo.</li>
                <li>Trabajar fuerza, core y agilidad.</li>
                <li>Aumentar tu nivel de energía y motivación.</li>
                <li>Acelerar tu metabolismo.</li>
            </ul> 
        </p>

         <form class="reserva" action="reserva_hiit.php" method="POST">
            <h1>Horarios disponibles</h1>
            <input type="hidden" name="id_servicio" value="3">

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

</body>
</html>

