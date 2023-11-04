<?php
include 'conexion.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Reservar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <script src='main.js'></script>
</head>
<style>
    body {
        background-image: url('./img/fondo.avif');
        /* Reemplaza 'ruta_de_la_imagen.jpg' con la ruta de tu imagen de fondo */
    }
</style>

<body>


    <div class="header">
        <div class="logo">
            <img src="img/logo_solo.png" alt="Logo de tu sitio web">
        </div>
        <div class="titles">
            <h1 id="i1">PLAYGROUND PRO</h1>
            <h2 id="i2">"Encuentra, reserva y disfruta de canchas sintéticas al alcance de tu mano"</h2>
        </div>
    </div>

    <ul class="navbar">
        <li class="nav-item"><a href="index.php">Inicio</a></li>
        <li class="nav-item"><a href="canchas.php">Canchas</a></li>
        <li class="nav-item"><a href="#">Soporte</a></li>
        <li class="nav-item dropdown">
            <a href="#">Registrar</a>
            <div class="dropdown-content">
                <a href="reg_usuario.php">Usuario</a>
                <a href="reg_empresa.php">Empresa</a>
            </div>
        </li>
        <li class="nav-item"><a href="ingresar.php">Ingresar</a></li>
    </ul>
    <br>
    <h2>Agenda tu Reserva</h2>
    <div class="page-container">
        <div class="consulta-window">
            <h1>Consulta Disponibilidad</h1>


            <div class="form">
                <div class="icon-label">
                    <img src="img/ubication.jpg" alt="Empresas Registradas">
                </div>
                <select id="empresas">
                    <?php
                    include 'conexion.php';

                    // Realiza una consulta para obtener la lista de empresas
                    $sql = "SELECT * FROM empresa"; // Asegúrate de que el nombre de la tabla coincida con tu base de datos
                    
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Muestra las empresas en el menú desplegable
                            echo '<option value="' . $row["Id_Empresa"] . '">' . $row["Razon_Social"] . '</option>';
                        }
                    } else {
                        echo '<option value="0">No hay empresas disponibles</option>';
                    }
                    $conn->close();
                    ?>
                </select>



                <div class="icon-label">
                    <img src="img/tipe.png" alt="Tipo de Cancha">
                </div>
                <select id="tipo-cancha">
                    <?php
                    include 'conexion.php';

                    // Realiza una consulta para obtener los tamaños de canchas desde la tabla "detalle_cancha"
                    $sql = "SELECT DISTINCT Tamaño FROM detalle_cancha"; // Asegúrate de que el nombre de la columna y la tabla coincidan con tu base de datos
                    
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Muestra los tamaños de canchas en el menú desplegable
                            echo '<option value="' . $row["Tamaño"] . '">' . $row["Tamaño"] . '</option>';
                        }
                    } else {
                        echo '<option value="No especificado">No hay tamaños de canchas disponibles</option>';
                    }
                    $conn->close();
                    ?>
                </select>




                <div class="icon-label">
                    <img src="img/calendario.png" alt="Fecha">
                </div>
                <input type="date" id="fr">
                <br>
                <button id="consultar-button">Consultar</button>
            </div>
        </div>

        

        <div class="horario-window">
            <h1>Horario de Reservas</h1>
            <p>Fecha seleccionada: <span id="fecha-seleccionada"></span></p>
            <p>Tipo de Cancha: <span id="tipo-cancha-seleccionado"></span></p>

            <table>
                <tr>
                    <th>Hora</th>
                    <th>Disponibilidad</th>
                    <th>Reservar/Cancelar Reserva</th>
                </tr>
                <!-- Repite este bloque para cada hora -->
                <tr>
                    <td>3:00 PM</td>
                    <td>Disponible</td>
                    <td>
                        <form action="procesar_reserva.php" method="post">
                            <div class="button-container">
                                <button type="submit" name="reservar" class="reservar-button">Reservar</button>
                                <button type="submit" name="cancelar" class="cancelar-button">Cancelar Reserva</button>
                            </div>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>4:00 PM</td>
                    <td>Disponible</td>
                    <td>
                        <form action="procesar_reserva.php" method="post">
                            <div class="button-container">
                                <button type="submit" name="reservar" class="reservar-button">Reservar</button>
                                <button type="submit" name="cancelar" class="cancelar-button">Cancelar Reserva</button>
                            </div>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>5:00 PM</td>
                    <td>Disponible</td>
                    <td>
                        <form action="procesar_reserva.php" method="post">
                            <div class="button-container">
                                <button type="submit" name="reservar" class="reservar-button">Reservar</button>
                                <button type="submit" name="cancelar" class="cancelar-button">Cancelar Reserva</button>
                            </div>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>6:00 PM</td>
                    <td>Disponible</td>
                    <td>
                        <form action="procesar_reserva.php" method="post">
                            <div class="button-container">
                                <button type="submit" name="reservar" class="reservar-button">Reservar</button>
                                <button type="submit" name="cancelar" class="cancelar-button">Cancelar Reserva</button>
                            </div>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>7:00 PM</td>
                    <td>Disponible</td>
                    <td>
                        <form action="procesar_reserva.php" method="post">
                            <div class="button-container">
                                <button type="submit" name="reservar" class="reservar-button">Reservar</button>
                                <button type="submit" name="cancelar" class="cancelar-button">Cancelar Reserva</button>
                            </div>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>8:00 PM</td>
                    <td>Disponible</td>
                    <td>
                        <form action="procesar_reserva.php" method="post">
                            <div class="button-container">
                                <button type="submit" name="reservar" class="reservar-button">Reservar</button>
                                <button type="submit" name="cancelar" class="cancelar-button">Cancelar Reserva</button>
                            </div>
                        </form>
                    </td>
                </tr>
                <!-- Agrega más filas para las horas restantes -->

            </table>

        </div>
    </div>
</body>

</html>