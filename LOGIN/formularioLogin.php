<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../REGISTRO/registro.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

  <!--HEADER-->
  <header>
    
    <div class="logo">
      <h1>N-FIT</h1>
      <p>Fuerza Intensidad Trabajo</p>
    </div>

    <nav>
      <a href="../INICIO/index.php">Inicio</a>
      <a href="../SERVICIOS/servicios.php">Servicios</a>
      <a href="../CONTACTO/contacto.php">Contacto</a>
      <a href="formularioLogin.php">Únete</a>
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

  <!--SECTION-->
  <main>
    <div class="login">
      <h1>Inicia sesión</h1>

      <form action="login.php" method="POST">
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" id="usuario" name="usuario" placeholder="Introduce tu usuario" required>

        <div class="contenedor-input">
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" placeholder="Introduce una contraseña" >
          <i class="fa-solid fa-eye-slash" id="alternarContrasena"></i>
        </div>

        <?php
       if (isset($_SESSION['error_sesion'])) {
       ?>
            <div class="error_sesion">
                <?php echo $_SESSION['error_sesion']; ?>
            </div>
       <?php
            unset($_SESSION['error_sesion']);
        }
        ?>

        <button class="enviar">Iniciar</button>
      </form>

      

      <p class="pieFormulario">¿No tienes cuenta? <a href="../REGISTRO/formularioRegistro.php" >Regístrate aquí</a></p>
    </div>
  </main>

  <hr>

  <!--FOOTER-->
  <footer>
    <div>
      <h3>UBICACIÓN</h3>
      <p>Polígono Industrial do Tambre, Rúa das Hedras, 24, <br> Santiago de Compostela, A Coruña</p>
    </div>

    <div>
      <h3>HORARIO</h3>
      <p>Lunes a Viernes: 07:00 - 22:30<br>
        Sábados: 07:00 - 18:00<br>
        Domingos: 07:00 - 14:00</p>
    </div>

    <div>
      <h3>REDES SOCIALES</h3>
      <p>nfitsantiago <img src="../IMAGENES/ig.png" width="30" height="30"></p>
    </div>
  </footer>
  <script src="contraseña.js" defer></script>
</body>
</html>
