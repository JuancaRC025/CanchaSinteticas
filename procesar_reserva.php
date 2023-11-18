<?php
include 'conexion.php';
session_start(); // Inicia la sesión

if (isset($_POST['reservar'])) {
    $tipoCancha = $_POST['tipoCancha'];
    $fechaSeleccionada = $_POST['fechaSeleccionada'];
    $hora = $_POST['hora'];
    $idUsuario = $_POST['idUsuario'];

    // Verifica si el Id_Usuario es válido antes de realizar la inserción
    $usuarioInfo = obtenerInfoUsuario($idUsuario);
    if ($usuarioInfo) {
        $nombreUsuario = $usuarioInfo['Nombres']; // Cambia aquí a 'Nombres'

        // Realiza la inserción de la reserva en la base de datos, incluyendo el Id_Usuario
        $sql = "INSERT INTO reserva (Id_Usuario, Id_Detalle_Cancha, Fecha, Hora) VALUES ('$idUsuario', (SELECT Id_Detalle_Cancha FROM detalle_cancha WHERE Tamaño = '$tipoCancha'), '$fechaSeleccionada', '$hora')";

        if ($conn->query($sql) === TRUE) {
            // Éxito en la inserción, muestra la ventana emergente con JavaScript
            echo '<script>
            alert("Reserva realizada con éxito.\n\nNombre del Usuario: ' . $nombreUsuario . '\nFecha Seleccionada: ' . $fechaSeleccionada . '\nHora: ' . $hora . '");
            setTimeout(function() {
                window.location.href = "reservar.php";
            }, 1000); // Redirige después de 10 segundos (10000 milisegundos)
          </script>';
        } else {
            echo "Error al realizar la reserva: " . $conn->error;
        }
    } else {
        echo "El usuario no es válido. Por favor, proporcione un Id_Usuario válido.";
    }
}

function obtenerInfoUsuario($usuarioId)
{
    include 'conexion.php'; // Incluye el archivo de conexión

    // Escapa el valor del Id_Usuario para evitar inyecciones SQL (dependiendo de la configuración de tu base de datos)
    $usuarioId = $conn->real_escape_string($usuarioId);

    // Realiza una consulta a la base de datos para obtener información del usuario
    $sql = "SELECT * FROM usuario WHERE Id_Usuario = '$usuarioId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Retorna la información del usuario
        return $result->fetch_assoc();
    } else {
        // Retorna falso si el usuario no es válido
        return false;
    }
}

$conn->close();
?>
