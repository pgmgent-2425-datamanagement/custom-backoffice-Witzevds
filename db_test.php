<?php

// Laad je configuratie of environment variables
require 'config.php';

// Probeer verbinding te maken met de database
try {
  // Database connectie configureren
  $dsn = "mysql:host={$config['db_host']};dbname={$config['db_database']};port={$config['db_port']}";
  $pdo = new PDO($dsn, $config['db_username'], $config['db_password']);

  // Zorg ervoor dat fouten als exceptions worden weergegeven
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Test query
  $stmt = $pdo->query("SELECT 1");
  echo "Database connection successful!";
} catch (PDOException $e) {
  echo "Database connection failed: " . $e->getMessage();
}
