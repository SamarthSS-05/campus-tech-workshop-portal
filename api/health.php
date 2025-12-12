<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Simple health check endpoint
$response = [
    'status' => 'ok',
    'message' => 'Campus Tech Workshop Portal is running',
    'timestamp' => date('Y-m-d H:i:s'),
    'php_version' => PHP_VERSION
];

// Test database connection
try {
    include '../config.php';
    $conn->query("SELECT 1");
    $response['database'] = 'connected';
    $conn->close();
} catch (Exception $e) {
    $response['database'] = 'error';
    $response['db_error'] = $e->getMessage();
}

echo json_encode($response, JSON_PRETTY_PRINT);
?>