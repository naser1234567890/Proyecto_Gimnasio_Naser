<?php
session_start();
include("../CONEXION/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $fila = $result->fetch_assoc();

        
        if (password_verify($password, $fila['password'])) {
            
            $_SESSION['usuario'] = $fila['usuario'];
            $_SESSION['nombre'] = $fila['nombre'];
            $_SESSION['email'] = $fila['email'];
            $_SESSION['id_usuario'] = $fila['id_usuario'];

            
            header("Location: ../INICIO/index.php");
            exit;
        } else {
           
            $_SESSION['error_sesion']= "Contraseña incorrecta." ;
            header("Location: formularioLogin.php");
        
        }
    } else {
        
        $_SESSION['error_sesion']= "El usuario no existe. Regístrate";
        header("Location: formularioLogin.php");
        
    }

    $conn->close();
}
?>
