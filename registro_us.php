<?php
include 'conexion.php';


$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$contrasena = md5($_POST['contrasena']);


$sql = "INSERT INTO usuario (Nombres,Apellidos,Correo_Electronico,Telefono,Contraseña) VALUES ('$nombre', '$apellidos','$correo','$telefono','$contrasena')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado correctamente";
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
