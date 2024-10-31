<?php

//DESDE LA CONSOLA ESCRIBIR: php crear_base_datos.php



$servername = "localhost";
$username = "root"; // Cambia esto por tu usuario de MySQL
$password = ""; // Cambia esto por tu contraseña de MySQL
$dbname = "final3f"; // Nombre de la base de datos que deseas crear

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear base de datos si no existe
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos '$dbname' creada exitosamente\n";
} else {
    echo "Error al crear la base de datos: " . $conn->error . "\n";
}

// Seleccionar la base de datos
$conn->select_db($dbname);

// Crear tabla 'usuarios' si no existe
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla 'usuarios' creada exitosamente\n";
} else {
    echo "Error al crear la tabla: " . $conn->error . "\n";
}

// Insertar registro si la tabla está vacía
$sql = "SELECT COUNT(*) AS count FROM usuarios";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row['count'] == 0) {
    $sql = "INSERT INTO usuarios (usuario, password) VALUES ('admin', 'admin')";
    if ($conn->query($sql) === TRUE) {
        echo "Registro 'admin' insertado exitosamente\n";
        
    } else {
        echo "Error al insertar registro: " . $conn->error . "\n";
    }
    
    echo PHP_EOL; 
    echo "CTRL + CLIC EN EL SIGUIENTE ENLACE:  http://localhost/final3f/login/\n";
}

// Cerrar conexión
$conn->close();
?>
