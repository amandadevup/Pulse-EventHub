<?php
// Configurações do banco de dados
const DB_HOST = 'localhost';
const DB_NAME = 'minipulse';
const DB_USER = 'root';
const DB_PASS = '';

// Inicia sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Autoload simples
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../app/controllers/',
        __DIR__ . '/../app/models/'
    ];
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
