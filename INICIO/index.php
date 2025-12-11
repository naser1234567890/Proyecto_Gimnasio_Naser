<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="index.css">
</head>

<body>

  <!-- HEADER -->
  <header>
    <div class="logo">
       <h1>GOLD GYM</h1>
      
    </div>

    <nav>
      <a href="index.php">Inicio</a>
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
        echo '<a href="../LOGIN/logout.php"><button class="logout">CERRAR</button></a>';
       

      }
    ?>


  </header>
  
  <!-- MAIN -->
  <main>
    
    <h2 id="textoAnimado"></h2>
    
  </main>

  <!-- SECTION -->
  <section>
    <h2>PRECIOS</h2>
    <div class="precios">
      <div class="dia"><h3>PASE DIARIO</h3><span class="numero">10€</span> </div>
      <div class="mes">
        <h3>CUOTA MENSUAL Y MATRÍCULA</h3>
        <p>Matrícula <br> <span class="numero">40€</span> <br>
        Pago mensual <br> <span class="numero">30€</span>
        </p>
      </div>
    </div>
  </section>

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
  <script src="index.js" defer></script>
</body>

</html>