<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propinas Cripta Burger</title>
    <link rel="icon" type="imagenes/cripta.png" href="favicon.png">
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
            margin-top: 50px;
            flex: 1;
        }
        .text-center {
            text-align: center;
        }
        .btn-group {
            display: flex;
            justify-content: center;
        }
        .btn-group .btn {
            margin: 0 15px; /* Ajusta el espacio entre botones */
            border-radius: 15px; /* Redondea las esquinas de los botones */
            padding: 10px 20px; /* Ajusta el padding de los botones */
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 15px; /* Redondea las esquinas de los campos del formulario */
        }
        .card {
            background-color: #fff; /* Fondo blanco para el formulario */
            color: #000; /* Texto negro para el formulario */
        }
        .card-body {
            padding: 20px; /* Ajusta el padding si es necesario */
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #222;
            color: #fff;
        }
        .btn-history {
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
        .btn-history:hover,
        .btn-history:focus,
        .btn-history:active {
            background-color: #000; /* Sin cambio en el color de fondo */
            color: #fff; /* Texto blanco al hacer clic */
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="imagenes/cripta.png" alt="Logo" class="logo">
                            <h2 class="card-title"><b>Calculo de Propinas</b></h2>
                        </div>
                        <form action="calcular.php" method="post">
                            <div class="form-group">
                                <label for="total">Ingresa el total de propinas del turno:</label>
                                <input type="number" class="form-control" id="total" name="total" step="0.01" required>
                            </div>
                            <div class="form-group">
                                <label for="cantidad_meseros">Ingresa la cantidad de meseros en turno:</label>
                                <input type="number" class="form-control" id="cantidad_meseros" name="cantidad_meseros" required>
                            </div>
                            <div class="form-group">
                                <label for="turno">Turno a calcular:</label>
                                <select id="turno" name="turno" class="form-control" required>
                                    <option value="">Selecciona el turno</option>
                                    <option value="12:00 PM a 3:00 PM">12:00 PM - 3:00 PM</option>
                                    <option value="3:00 PM a 7:00 PM">3:00 PM - 7:00 PM</option>                                    
                                    <option value="7:00 PM a 11:00 PM">7:00 PM - 11:00 PM</option>
                                    <!-- Agrega más opciones si tienes más turnos -->
                                </select>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">Calcular</button>
                                <button type="reset" class="btn btn-secondary">Limpiar</button>
                            </div>
                            <!-- Botón para el historial -->
                            <div class="text-center">
                                <a href="registros.php" class="btn-history">Historial de Registros</a>
                            </div>
                        </form>
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
