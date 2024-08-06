<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Propinas Cripta Punta Este</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #000; /* Fondo negro para toda la página */
            color: #fff; /* Texto blanco para contraste */
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            margin-top: 20px; /* Reducido para adaptarse a dispositivos móviles */
            flex: 1;
            position: relative;
            padding: 0 15px; /* Espaciado horizontal para pequeños dispositivos */
        }

        .card {
            background-color: #fff; /* Fondo blanco para la tarjeta */
            color: #000; /* Texto negro para la tarjeta */
            position: relative;
            padding-top: 60px; /* Aumenta el espacio superior para evitar el empalme */
        }

        .card-body {
            padding: 10px; /* Menos padding en pantallas pequeñas */
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #222;
            color: #fff;
        }

        .table-container {
            overflow-x: auto; /* Permite el desplazamiento horizontal si el contenido es demasiado ancho */
        }

        .table {
            width: 100%; /* Asegura que la tabla use todo el ancho disponible */
        }

        .table th, .table td {
            color: #000;
            white-space: nowrap; /* Evita que el texto se divida en varias líneas */
        }

        .table th:nth-child(8), /* Aplica estilos específicos a la columna "Turno del corte" */
        .table td:nth-child(8) {
            min-width: 150px; /* Ajusta el ancho mínimo para mejorar la visualización en móviles */
        }

        .btn-back {
            margin-top: 20px;
            border-radius: 15px; /* Redondea las esquinas del botón */
            padding: 10px 20px; /* Ajusta el padding del botón */
            background-color: #000; /* Color de fondo negro */
            border: none;
            color: #fff; /* Texto blanco */
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back:hover,
        .btn-back:focus,
        .btn-back:active {
            background-color: #333; /* Un poco más claro para el efecto hover */
            color: #fff; /* Texto blanco al hacer clic */
            text-decoration: none;
        }

        .logo {
            position: absolute;
            top: 10px; /* Ajusta la posición vertical de la imagen */
            right: 10px; /* Ajusta la posición horizontal de la imagen */
            width: 80px; /* Ajusta el tamaño de la imagen para pantallas pequeñas */
        }

        @media (max-width: 576px) {
            .logo {
                width: 60px; /* Aún más pequeño en pantallas extra pequeñas */
            }

            .btn-back {
                font-size: 14px; /* Ajusta el tamaño de la fuente para pantallas pequeñas */
                padding: 8px 16px; /* Ajusta el padding del botón */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <!-- Imagen del logo dentro de la tarjeta -->
                    <img src="imagenes/cripta.png" alt="Logo" class="logo">
                    <div class="card-body">
                        <h3 class="card-title">Registro general de propinas <b>Cripta Punta Este</b></h3>
                        <br>
                        <form method="get" action="">
                            <div class="form-group">
                                <label for="periodo">Filtrar por:</label>
                                <select id="periodo" name="periodo" class="form-control" onchange="this.form.submit()">
                                    <option value="dia" <?php echo isset($_GET['periodo']) && $_GET['periodo'] == 'dia' ? 'selected' : ''; ?>>Hoy</option>
                                    <option value="semana" <?php echo isset($_GET['periodo']) && $_GET['periodo'] == 'semana' ? 'selected' : ''; ?>>Última semana</option>
                                    <option value="mes" <?php echo isset($_GET['periodo']) && $_GET['periodo'] == 'mes' ? 'selected' : ''; ?>>Último mes</option>
                                    <option value="ano" <?php echo isset($_GET['periodo']) && $_GET['periodo'] == 'ano' ? 'selected' : ''; ?>>Último año</option>
                                </select>
                            </div>
                        </form>

                        <?php
                        // Conectar a la base de datos
                        $servername = "localhost"; // Nombre del servidor de base de datos
                        $username = "u338564784_admincripta"; // Nombre de usuario de la base de datos
                        $password = "Martaylor1494"; // Contraseña de la base de datos
                        $dbname = "u338564784_propinas_db"; // Nombre de la base de datos

                        // Crear conexión
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Verificar la conexión
                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }

                        // Determinar el rango de fechas
                        $periodo = isset($_GET['periodo']) ? $_GET['periodo'] : 'dia';
                        $hoy = date('Y-m-d');

                        switch ($periodo) {
                            case 'semana':
                                $inicio = date('Y-m-d', strtotime('-1 week'));
                                break;
                            case 'mes':
                                $inicio = date('Y-m-d', strtotime('-1 month'));
                                break;
                            case 'ano':
                                $inicio = date('Y-m-d', strtotime('-1 year'));
                                break;
                            default:
                                $inicio = $hoy;
                        }

                        // Consultar los datos
                        $sql = "SELECT * FROM propinas WHERE fecha >= '$inicio' AND fecha <= '$hoy' ORDER BY fecha DESC";
                        $result = $conn->query($sql);

                        if ($result === FALSE) {
                            echo "Error en la consulta: " . $conn->error;
                        }
                        ?>

                        <div class="table-container">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha</th>
                                        <th>Total de propinas</th>
                                        <th>Cantidad para cocina</th>
                                        <th>Cantidad para cajas</th>
                                        <th># Meseros en turno</th>
                                        <th>Propina por Mesero</th>
                                        <th>Turno del corte</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            // Aquí usamos number_format para formatear la propina por mesero
                                            $propina_por_mesero = number_format($row['propina_por_mesero'], 2);
                                            echo "<tr>
                                                    <td>{$row['id']}</td>
                                                    <td>{$row['fecha']}</td>                                                                                             
                                                    <td>\${$row['total']}</td>
                                                    <td>\${$row['propina_cocina']}</td>
                                                    <td>\${$row['propina_cajas']}</td>
                                                    <td>{$row['cantidad_meseros']}</td>
                                                    <td>\${$propina_por_mesero}</td>
                                                    <td>{$row['turno']}</td>                                                      
                                                </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>No se encontraron registros</td></tr>";
                                    }
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Botón para volver al formulario de inicio de registro -->
                        <div class="text-center">
                            <a href="index.php" class="btn-back">Volver al Inicio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Copyright © 2024 | <a href="https://websyebra.com" target="_blank">Created by WEBSYEBRA.COM</a></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
