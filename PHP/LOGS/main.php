<?php
require 'Logger.php';

// Usar el logger para registrar mensajes
$logger->info('El sistema ha iniciado correctamente.');
$logger->warning('El uso de memoria está llegando al límite.');
$logger->error('No se pudo conectar a la base de datos.');

// Confirmación en la pantalla
echo "Mensajes de log registrados. Revisa el archivo de logs.\n";
?>
