<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$servername", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS hackathon_portal");
    $pdo->exec("USE hackathon_portal");
    
    // Create table
    $sql = "CREATE TABLE IF NOT EXISTS registrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        college VARCHAR(150) NOT NULL,
        department VARCHAR(100) NOT NULL,
        year VARCHAR(20) NOT NULL,
        tracks VARCHAR(255) NOT NULL,
        skill_level VARCHAR(20) NOT NULL,
        file_path VARCHAR(255) DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        INDEX idx_email (email),
        INDEX idx_created_at (created_at),
        INDEX idx_skill_level (skill_level)
    )";
    
    $pdo->exec($sql);
    
    // Insert sample data
    $stmt = $pdo->prepare("INSERT INTO registrations (name, email, phone, college, department, year, tracks, skill_level) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    $sampleData = [
        ['John Doe', 'john.doe@example.com', '9876543210', 'ABC Engineering College', 'Computer Science', '3rd', 'Web Development, AI/ML', 'Intermediate'],
        ['Jane Smith', 'jane.smith@example.com', '9876543211', 'XYZ Institute of Technology', 'Information Technology', '2nd', 'Cybersecurity, IoT', 'Beginner'],
        ['Mike Johnson', 'mike.johnson@example.com', '9876543212', 'DEF University', 'Electronics', '4th', 'IoT, UI/UX', 'Advanced']
    ];
    
    foreach ($sampleData as $data) {
        $stmt->execute($data);
    }
    
    echo "Database and tables created successfully!";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>