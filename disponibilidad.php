<?php
include 'conexion.php';

// Obtener los parámetros de la URL (tipoCancha y fechaSeleccionada)
$tipoCancha = $_GET['tipoCancha'];
$fechaSeleccionada = $_GET['fechaSeleccionada'];

// Realiza una consulta en la base de datos para obtener las reservas para la fecha y tipo de cancha seleccionados
$sql = "SELECT Hora FROM reserva WHERE Id_Detalle_Cancha IN (SELECT Id_Detalle_Cancha FROM detalle_cancha WHERE Tamaño = '$tipoCancha') AND Fecha = '$fechaSeleccionada'";

$result = $conn->query($sql);

// Comprueba si hay resultados
$horasReservadas = NULL;

if ($result->num_rows > 0) {
    $horasReservadas = array();

    while ($row = $result->fetch_assoc()) {
        $horaReservada = $row["Hora"];
        $horasReservadas[] = $horaReservada;
    }
}

echo '<table>';
echo '<tr><th>Hora</th><th>Disponibilidad</th><th>Reservar/Cancelar Reserva</th></tr>';

$horasDisponibles = array("15:00:00", "16:00:00", "17:00:00", "18:00:00", "19:00:00", "20:00:00");

foreach ($horasDisponibles as $hora) {
    echo '<tr>';
    echo '<td>' . $hora . '</td>';
    if ($horasReservadas !== NULL && in_array($hora, $horasReservadas)) {
        echo '<td>No disponible</td>';
        echo '<td><button>Cancelar</button></td>';
    } else {
        echo '<td>Disponible</td>';
        echo '<td><button>Reservar</button></td>';
    }
    echo '</tr>';
}

echo '</table>';

$conn->close();

?>
