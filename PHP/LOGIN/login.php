<?php
require 'Auth.php';

// Si ya está autenticado, redirigir a la página de bienvenida
if ($auth->isAuthenticated()) {
    header('Location: welcome.php');
    exit();
}

// Manejo de envío de formulario
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($auth->login($username, $password)) {
        header('Location: welcome.php'); // Redirigir si el login es exitoso
        exit();
    } else {
        $message = 'Usuario o contraseña incorrectos.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <?php if ($message): ?>
        <p style="color: red;"><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Usuario:</label>
        <input type="text" name="username" required>
        <br>
        <label>Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
