<?php
require 'Auth.php';

$auth->logout(); // Cerrar sesión
header('Location: login.php'); // Redirigir a la página de login
exit();
?>
