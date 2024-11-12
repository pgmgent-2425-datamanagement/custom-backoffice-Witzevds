<?php

// Directory instellen
const BASE_DIR = __DIR__;

// Controleer of de omgevingsvariabelen correct zijn geladen
if (!isset($_ENV['DB_DATABASE']) || !isset($_ENV['DB_USERNAME']) || !isset($_ENV['DB_PASSWORD'])) {
    throw new Exception("Database environment variables are not set. Please check your configuration.");
}

// Configuratie array
$config = [
    'base_dir' => BASE_DIR,
    'base_url' => $_ENV['BASE_URL'] ?? '/',
    'db_connection' => $_ENV['DB_CONNECTION'] ?? 'mysql',
    'db_host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
    'db_port' => $_ENV['DB_PORT'] ?? '3306',
    'db_database' => $_ENV['DB_DATABASE'],
    'db_username' => $_ENV['DB_USERNAME'],
    'db_password' => $_ENV['DB_PASSWORD'],
];
