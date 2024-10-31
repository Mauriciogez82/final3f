<?php
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    // Redirige al inicio de sesión si no está autenticado
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logeado</title>
</head>
<body>
    <h1>Bienvenido <?php echo htmlspecialchars($_SESSION['usuario']); ?></h1>
    <h3><a href="logout.php">Cerrar sesión</a></h3>
</body>
</html>
