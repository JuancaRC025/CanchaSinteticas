<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se recibió el valor del campo idRes
    if (isset($_POST['idRes'])) {
        $id = $_POST['idRes'];
        
        // Mostrar una ventana emergente de confirmación en JavaScript
        echo '<script>
            var confirmDelete = confirm("¿Está seguro de eliminar esta reserva?");
            if (confirmDelete) {
                // El usuario ha confirmado la eliminación, realizar la consulta SQL
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "eliminar_reserva.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("idRes=" + ' . $id . ');

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        alert("Reserva Cancelada Con Exito");
                        window.location.href = "reservar.php";
                    } else {
                        alert("Error al cancelar la reserva: " + xhr.responseText);
                    }
                };
            }
            // Si el usuario cancela, no hacer nada
        </script>';
    } else {
        echo "El campo 'idRes' no se encontró en la solicitud POST.";
    }
} else {
    echo "Acceso no permitido.";
}

$conn->close();
?>
