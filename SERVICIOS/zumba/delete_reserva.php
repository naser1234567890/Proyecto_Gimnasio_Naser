<?php
session_start();
include("../../CONEXION/conexion.php");


if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../../LOGIN/formularioLogin.php");
    exit;
}


$id_servicio = 4;
$id_usuario = $_SESSION['id_usuario'];



if(isset($_POST['eliminar'])){

    $id_reserva = $_POST['id_reserva'];

    $sql = "DELETE FROM reservas 
        WHERE id_reserva = '$id_reserva' 
        AND id_usuario = '$id_usuario'";

    $conn->query($sql);
   
    header("Location: delete_reserva.php"); 
    exit;
}

$sql = "SELECT * FROM reservas 
        WHERE id_usuario = '$id_usuario' 
        AND id_servicio = '$id_servicio'
        ";

$result = $conn->query($sql);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="zumba.css">
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
        echo '<a href="../../LOGIN/logout.php"><button class="logout">CERRAR</button></a>';
        
      }
    ?>

</header>

<!-- MAIN -->
<main>

    <div class="contenedor">
        <h1>ZUMBA</h1>

        

       <!-- <div class="zumba">
            <img src="../../IMAGENES/zumba.jpg" alt="zumba">
        </div> -->  
      
      
    <?php
if ($result->num_rows > 0) {

    echo "<h3>Tus reservas:</h3><br><br>";

            
            echo "<table class='tabla-reservas'>";
            echo "<thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Acción</th>
                    </tr>
                  </thead>";
            echo "<tbody>";

            while ($reserva = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $reserva['fecha'] . "</td>";
                echo "<td>" . $reserva['hora'] . "</td>";
                echo "<td>
                        <form action='delete_reserva.php' method='POST' style='margin:0;'>
                            <input type='hidden' name='id_reserva' value='" . $reserva['id_reserva'] . "'>
                            <button type='submit' name='eliminar' class='btn-eliminar'>Eliminar</button>
                        </form>
                      </td>";
                echo "</tr>";
            }

            echo "</tbody></table>";

} else {
    ?>
    
    <h3>No tienes reservas aún</h3>
    <a href="reserva.php?"><button>Reservar</button></a>
    
    <?php
}
?>
  

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

