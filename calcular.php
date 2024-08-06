<?php
// Conectar a la base de datos en el servidor de Hostinger
$servername = "localhost"; // Nombre del servidor de base de datos de Hostinger
$username = "u338564784_admincripta"; // Nombre de usuario de la base de datos
$password = "Martaylor1494"; // Contraseña de la base de datos
$dbname = "u338564784_propinas_db"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$total = isset($_POST['total']) ? $_POST['total'] : 0;
$cantidad_meseros = isset($_POST['cantidad_meseros']) ? $_POST['cantidad_meseros'] : 1; // Evitar división por cero
$turno = isset($_POST['turno']) ? $_POST['turno'] : 'No especificado'; // Texto del turno
$fecha = date('Y-m-d'); // Fecha actual

// Calcular las propinas
$propina_cocina = $total * 0.17;
$propina_cajas = $total * 0.07;
$total_meseros = $total - $propina_cocina - $propina_cajas;
$propina_por_mesero = $cantidad_meseros > 0 ? $total_meseros / $cantidad_meseros : 0;

// Guardar en la base de datos
$stmt = $conn->prepare("INSERT INTO propinas (total, propina_cocina, propina_cajas, cantidad_meseros, propina_por_mesero, turno, fecha) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ddddsss", $total, $propina_cocina, $propina_cajas, $cantidad_meseros, $propina_por_mesero, $turno, $fecha);
$stmt->execute();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado cálculo propinas Cripta Punta Este</title>
    <link rel="icon" type="imagenes/cripta.png" href="favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            background-color: #000; /* Fondo negro para toda la página */
            color: #fff; /* Texto blanco para contraste */
            display: flex;
            flex-direction: column;
        }
        .container {
            flex: 1;
            margin-top: 50px;
        }
        .card {
            background-color: #fff; /* Fondo blanco para el formulario */
            color: #000; /* Texto negro para el formulario */
            border-radius: 15px; /* Redondea las esquinas de la tarjeta */
        }
        .card-body {
            padding: 20px; /* Ajusta el padding si es necesario */
            text-align: center; /* Centra el texto dentro del card-body */
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .btn {
            margin-top: 20px; /* Espacio adicional arriba del botón */
            border-radius: 15px; /* Redondea las esquinas de los botones */
            padding: 10px 20px; /* Ajusta el padding de los botones */
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #222;
            color: #fff;
        }
        .result {
            background-color: #e0e0e0; /* Fondo gris para los resultados */
            border-radius: 10px; /* Bordes redondeados */
            padding: 10px;
            margin-bottom: 10px;
            display: inline-block; /* Permite ajustar el tamaño al contenido */
            width: 100%; /* Asegura que ocupe el ancho completo dentro del contenedor */
            text-align: left; /* Alinea el texto a la izquierda */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="imagenes/cripta.png" alt="Logo" class="logo">
                            <h2 class="card-title"><b>Resultado del Calculo</b></h2>
                        </div>
                        <br><br>

                        <div class="result">
                            <p><b>Total de propina para el área de cocina:</b> $<?php echo number_format($propina_cocina, 2); ?></p>
                        </div>
                        <div class="result">
                            <p><b>Total de propina para el área de cajas:</b> $<?php echo number_format($propina_cajas, 2); ?></p>
                        </div>
                        <div class="result">
                            <p><b>Total de propina para meseros:</b> $<?php echo number_format($total_meseros, 2); ?></p>
                        </div>
                        <div class="result">
                            <p><b>Cada mesero recibirá:</b> $<?php echo number_format($propina_por_mesero, 2); ?></p>
                        </div>
                        <div class="result">
                            <p><b>Turno:</b> <?php echo htmlspecialchars($turno); ?></p>
                        </div>
                        <div class="result">
                            <p><b>Fecha del cálculo:</b> <?php echo htmlspecialchars($fecha); ?></p>
                        </div>
                        <a href="index.php" class="btn btn-secondary">Volver a calcular</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="footer">
        <p>Copyright © 2024 | <a href="https://websyebra.com" target="_blank">Created by WEBSYEBRA.COM</a></p>
    </div>
</body>
</html>