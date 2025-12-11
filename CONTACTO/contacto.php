<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="contacto.css">
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
      <a href="contacto.php">Contacto</a>
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
            echo '<a href="../LOGIN/logout.php"><button class="logout">CERRAR</button></a>';
        }
        ?>

  </header>

  <!-- MAIN -->
  <main>
    <h2>Ponte en contacto</h2>
    <h1>CONTACTO</h1>
    <p>Rellena este formulario y te contestaremos lo antes posible.</p>


    <form  action="contacto.php" method="POST">
         <label for="nombre">Nombre</label>
      <input type="text" id="nombre" name="nombre" required>

      <label for="telefono">Teléfono</label>
      <input type="tel" id="telefono" name="telefono" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

      <label for="mensaje">Mensaje</label>
      <textarea id="mensaje" name="mensaje" required></textarea>

       <button class="enviar">Enviar</button>

    </form>
</main>


  <hr></hr>

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

<script src="contacto.js" defer></script>
</body>
</html>