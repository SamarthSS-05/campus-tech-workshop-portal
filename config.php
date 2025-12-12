<?php
// Database configuration
// Use environment variables for production, fallback to local values
$host = $_ENV['DB_HOST'] ?? getenv('DB_HOST') ?: "localhost";
$user = $_ENV['DB_USER'] ?? getenv('DB_USER') ?: "root";
$pass = $_ENV['DB_PASS'] ?? getenv('DB_PASS') ?: "";
$dbname = $_ENV['DB_NAME'] ?? getenv('DB_NAME') ?: "hackathon_portal";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf8
$conn->set_charset("utf8");
?>