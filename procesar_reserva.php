<?php
include 'conexion.php';
session_start(); // Inicia la sesión

if (isset($_POST['reservar'])) {
    $tipoCancha = $_POST['tipoCancha'];
    $fechaSeleccionada = $_POST['fechaSeleccionada'];
    $hora = $_POST['hora'];
    $idUsuario = $_POST['idUsuario'];

    // Verifica si el Id_Usuario es válido antes de realizar la inserción
    if (esUsuarioValido($idUsuario)) {
        // Realiza la inserción de la reserva en la base de datos, incluyendo el Id_Usuario
        $sql = "INSERT INTO reserva (Id_Usuario, Id_Detalle_Cancha, Fecha, Hora) VALUES ('$idUsuario', (SELECT Id_Detalle_Cancha FROM detalle_cancha WHERE Tamaño = '$tipoCancha'), '$fechaSeleccionada', '$hora')";

        if ($conn->query($sql) === TRUE) {
            // Éxito en la inserción, muestra la ventana emergente con JavaScript
            echo '<script>
                    alert("Reserva realizada con éxito. Valor de idUsuario: ' . $idUsuario . '");
                    window.location.href = "reservar.php"; // Redirige a una página de éxito
                  </script>';
        } else {
            echo "Error al realizar la reserva: " . $conn->error;
        }
    } else {
        echo "El usuario no es válido. Por favor, proporcione un Id_Usuario válido.";
    }
}

function esUsuarioValido($usuarioId)
{
    include 'conexion.php'; // Incluye el archivo de conexión

    // Escapa el valor del Id_Usuario para evitar inyecciones SQL (dependiendo de la configuración de tu base de datos)
    $usuarioId = $conn->real_escape_string($usuarioId);

    // Realiza una consulta a la base de datos para verificar si el Id_Usuario existe
    $sql = "SELECT * FROM usuario WHERE Id_Usuario = '$usuarioId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El Id_Usuario es válido, se encontró en la base de datos
        return true;
    } else {
        // El Id_Usuario no es válido, no se encontró en la base de datos
        return false;
    }
}


$conn->close();
?>