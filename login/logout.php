<?php

session_start();
session_destroy();

echo $_SESSION['usuario'].' Ha cerrado sesion.';

echo '<h3><a href="index.php">Login</a></h3>';

?>


