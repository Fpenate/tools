<?php
// Cargar la configuración
$config = require 'config.php';

class Logger {
    private $logFile;
    private $dateFormat;

    public function __construct($logFile, $dateFormat) {
        $this->logFile = $logFile;
        $this->dateFormat = $dateFormat;
    }

    // Método para escribir en el log
    public function log($level, $message) {
        $date = date($this->dateFormat);
        $logMessage = "[$date] [$level] $message" . PHP_EOL;

        // Guardar en el archivo de log
        file_put_contents($this->logFile, $logMessage, FILE_APPEND);
    }

    // Métodos específicos para cada tipo de log
    public function info($message) {
        $this->log('INFO', $message);
    }

    public function warning($message) {
        $this->log('WARNING', $message);
    }

    public function error($message) {
        $this->log('ERROR', $message);
    }
}

// Crear una instancia de Logger usando la configuración
$logger = new Logger($config['log_file'], $config['date_format']);
?>
