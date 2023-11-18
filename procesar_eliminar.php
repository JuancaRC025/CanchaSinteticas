<?php
include 'conexion.php';
session_start(); // Inicia la sesión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se recibió el valor del campo idRes
    if (isset($_POST['idRes'])) {
        $idReserva = $_POST['idRes'];

        // Verificar si el usuario actual es el propietario de la reserva o tiene rol de empresa
        $idUsuario = $_SESSION["id_usuario"];

        // Verificar si el usuario actual es un usuario normal
        $sqlUsuario = "SELECT * FROM usuario WHERE Id_Usuario = '$idUsuario'";
        $resultUsuario = $conn->query($sqlUsuario);

        if ($resultUsuario->num_rows > 0) {
            // El usuario es un usuario normal, buscar en la tabla de usuarios
            $sql = "SELECT * FROM reserva WHERE Id_Reserva = '$idReserva' AND Id_Usuario = '$idUsuario'";
        } else {
            // El usuario no es un usuario normal, buscar en la tabla de empresas
            $sql = "SELECT * FROM reserva WHERE Id_Reserva = '$idReserva' AND Id_Empresa = '$idUsuario'";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // El usuario es el propietario de la reserva o tiene rol de empresa, proceder con la eliminación
            $sqlEliminar = "DELETE FROM reserva WHERE Id_Reserva = '$idReserva'";
            
            if ($conn->query($sqlEliminar) === TRUE) {
                // Éxito en la eliminación
                echo '<script>
                alert("Reserva Cancelada con Exito.");
                window.location.href = "reservar.php";
             </script>';
            } else {
                echo "Error al cancelar la reserva: " . $conn->error;
            }
        } else {
            // El usuario no es el propietario de la reserva ni tiene rol de empresa
            echo '<script>
                    alert("No tienes permiso para cancelar esta reserva.");
                    window.location.href = "reservar.php";
                 </script>';
        }
    } else {
        echo "El campo 'idRes' no se encontró en la solicitud POST.";
    }
} else {
    echo "Acceso no permitido.";
}

$conn->close();
?>
