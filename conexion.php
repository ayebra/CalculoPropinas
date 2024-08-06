<?php
$servername = "localhost"; // o el nombre del servidor específico
$username = "u338564784_admincripta"; 
$password = "Martaylor1494"; 
$dbname = "u338564784_propinas_db"; 

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa";
}

$conn->close();
?>
