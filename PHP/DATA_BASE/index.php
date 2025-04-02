<?php

require 'Database.php';

// Crear instancia de la conexión
$db = new Database();
$conexion = $db->getConnection();

// Verificar conexión con una consulta simple
try {
    $stmt = $conexion->query("SELECT NOW()");
    $resultado = $stmt->fetch();
    echo "Conexión exitosa. Fecha y hora actual: " . $resultado['NOW()'];
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}

?>
