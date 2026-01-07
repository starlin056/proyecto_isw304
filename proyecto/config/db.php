<?php
$env = parse_ini_file(__DIR__ . '/.env', false, INI_SCANNER_TYPED);
if (!$env) { http_response_code(500); exit('Config .env no cargada'); }
date_default_timezone_set($env['TIMEZONE'] ?? 'UTC');

$dsn = "mysql:host={$env['DB_HOST']};dbname={$env['DB_NAME']};charset={$env['DB_CHARSET']}";
$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
];
try {
  $pdo = new PDO($dsn, $env['DB_USER'], $env['DB_PASS'], $options);
} catch (PDOException $e) {
  error_log("DB Error: " . $e->getMessage());
  http_response_code(500);
  exit('Error de conexión a BD.');
}
