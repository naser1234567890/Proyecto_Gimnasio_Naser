<?php
session_start();
include("../CONEXION/conexion.php");

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../LOGIN/formularioLogin.php");
    exit;
}

$id_usuario = $_SESSION['id_usuario'];


$sql = "SELECT r.id_reserva, r.fecha, r.hora, nombre_servicio 
        FROM reservas r
        INNER JOIN servicios s ON r.id_servicio = s.id_servicio
        WHERE r.id_usuario = '$id_usuario'
        ORDER BY r.fecha ASC, r.hora ASC";

$result = $conn->query($sql);


if (isset($_POST['eliminar'])) {
    $id_reserva = $_POST['id_reserva'];

    $delete = "DELETE FROM reservas 
                  WHERE id_reserva = '$id_reserva' 
                  AND id_usuario = '$id_usuario'";

    $conn->query($delete);
    header("Location: reservas.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Reservas</title>
    <link rel="stylesheet" href="reservas.css">
</head>

<body>

     <!-- ENCABEZADO -->
    <header>
        <div class="logo">
            <h1>GOLD GYM</h1>
            
        </div>

        <nav>
            <a href="../INICIO/index.php">Inicio</a>
            <a href="../SERVICIOS/servicios.php">Servicios</a>
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
    <h1>Todas tus reservas</h1>

    <input class="filtroReserva" type="text" id="filtroReserva" placeholder="Buscar por actividad...">

    <?php
    if ($result->num_rows > 0) {
        echo "
        <table>
            <tr>
                <th>Actividad</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acción</th>
            </tr>
        ";
        
        while ($fila = $result->fetch_assoc()) {
            echo "
            <tr class='filas'>
                <td>{$fila['nombre_servicio']}</td>
                <td>{$fila['fecha']}</td>
                <td>{$fila['hora']}</td>
                <td>
                    <form method='POST'>
                        <input type='hidden' name='id_reserva' value='{$fila['id_reserva']}'>
                        <button  type='submit' class='delete' name='eliminar'>Eliminar</button>
                    </form>
                </td>
            </tr>
            ";
        }

        echo "</table>";

    } else {
        echo "<p class='sin_reservas'>No tienes reservas todavía.</p>";
    }
    ?>
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
            <p>goldgymsantiago <img src="../IMAGENES/ig.png" width="30" height="30"></p>
        </div>
    </footer>
    <script src="reservas.js" defer></script>
</body>
</html>
