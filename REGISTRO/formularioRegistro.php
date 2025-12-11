<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="registro.css">
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
      <a href="formularioRegistro.php">Únete</a>
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
      <h1>REGISTRARSE</h1>
      
      <form id="formRegistro" action="registro.php" method="POST">

        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Introduce tu nombre completo" >

        <label for="usuario">Nombre de usuario:</label>
        <input type="text" id="usuario" name="usuario" placeholder="Elige un usuario" >

        <label for="email">Correo electrónico:</label>
        <input type="text" id="email" name="email" placeholder="Introduce tu email" >

        <div class="contenedor-input">
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" placeholder="Introduce una contraseña" >
          <i class="fa-solid fa-eye-slash" id="alternarContrasena"></i>
        </div>

       <div class="mensaje" id="mensaje"></div>

       <?php
       if (isset($_SESSION['error_registro'])) {
       ?>
            <div class="error_registro">
                <?php echo $_SESSION['error_registro']; ?>
            </div>
       <?php
            unset($_SESSION['error_registro']);
        }
        ?>

        <button  class="enviar">Enviar</button>
   
       <p class="pieFormulario">¿Ya tienes una cuenta? <a href="../LOGIN/formularioLogin.php">Inicia sesion aquí</a></p>
        
      </form>

      

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
        Sabados: 07:00 - 18:00<br>
        Domingos: 07:00 - 14:00</p>
    </div>

    <div>
      <h3>REDES SOCIALES</h3>
      <p>nfitsantiago <img src="../IMAGENES/ig.png" width="30" height="30"></p>
    </div>
  </footer>

  
  <script src="registro.js" defer></script>
  <script src="contraseña.js" defer></script>
</body>
</html>