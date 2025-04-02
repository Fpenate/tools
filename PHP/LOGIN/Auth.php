<?php
session_start(); // Iniciar la sesión

$config = require 'config.php'; // Cargar los usuarios

class Auth {
    private $users;

    public function __construct($users) {
        $this->users = $users;
    }

    // Método para iniciar sesión
    public function login($username, $password) {
        if (isset($this->users[$username]) && $this->users[$username] === $password) {
            $_SESSION['user'] = $username; // Guardar usuario en sesión
            return true;
        }
        return false;
    }

    // Método para verificar si hay una sesión activa
    public function isAuthenticated() {
        return isset($_SESSION['user']);
    }

    // Método para obtener el usuario autenticado
    public function getUser() {
        return $_SESSION['user'] ?? null;
    }

    // Método para cerrar sesión
    public function logout() {
        session_destroy(); // Destruir la sesión
    }
}

// Crear una instancia de autenticación
$auth = new Auth($config['users']);
?>
