<?php
if($_POST){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CursoSQL";

$nombre= $_POST['nombre'] ?? '';
$apellido1= $_POST['apellido1'] ?? '';
$apellido2= $_POST['apellido2'] ?? '';
$email= $_POST['email'] ?? '';
$usuario= $_POST['usuario'] ?? '';
$contraseña= $_POST['contraseña'] ?? '';
}


if (empty($nombre) || empty($apellido1) || empty($apellido2) || empty($email) || empty($usuario) || empty($contraseña)){
    echo "Rellene todos los campos.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "El email no es correcto.";
} elseif (strlen($contraseña) < 4 || strlen( $contraseña) >8) {
    echo "La contraseña debe tener entre 4 y 8 caracteres.";
} else{
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error){
        die("Error de conexion con la base de datos: ". $conn->connect_error);
    } 
}

$emailExists=false;
$checkEmailQuery= "SELECT * FROM FORMULARIO WHERE email='$email'";
$checkEmailResult= $conn->query($checkEmailQuery);
if ($checkEmailResult->num_rows>0) {
    $emailExists= true;
}
if ($emailExists){
    echo "Email ya registrado.";
} else{

    $hashedPassword = password_hash($contraseña, PASSWORD_BCRYPT);
    $insertQuery = "INSERT INTO FORMULARIO (nombre, apellido1, apellido2 , email , usuario , contraseña ) VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$usuario', '$hashedPassword')";
    if ($conn->query($insertQuery)=== true) {
    ?>
 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="container">
            <h1> Registro completado </h1>
            <p> Tu registro ha sido completado. </p>
            <a href="index.html"> Volver al formulario </a>
        </div>
    </body>
 </html>
 <?php
    } else {
        echo "Error al registrar los datos: " . $conn->error;
    }
}
$conn->close();

?>