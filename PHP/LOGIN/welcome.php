<?php
require 'Auth.php';

// Verificar si el usuario está autenticado
if (!$auth->isAuthenticated()) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
</head>
<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($auth->getUser()); ?>!</h2>
    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>
