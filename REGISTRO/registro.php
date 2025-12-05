<?php
session_start();
include("../CONEXION/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $sql= "SELECT * FROM usuarios WHERE usuario = '$usuario' OR email = '$email'";
    $check = $conn->query($sql);
    if ($check->num_rows > 0) {
        

        $_SESSION['error_registro']= "El usuario o correo ya existen.<br> Inicia sesión";
        header("Location: formularioRegistro.php");
        exit;
    }

    $sql2 = "INSERT INTO usuarios (nombre, usuario, email, password)
            VALUES ('$nombre', '$usuario', '$email', '$password')";

    if ($conn->query($sql2) === TRUE) {
        
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['email'] = $email;

        
        header("Location: ../INICIO/index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}



?>
