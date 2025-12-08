-- Database Schema for Campus Tech Workshop & Hackathon Portal
-- Execute these SQL commands in phpMyAdmin or MySQL command line

-- Create the database
CREATE DATABASE IF NOT EXISTS hackathon_portal;
USE hackathon_portal;

-- Create the registrations table
CREATE TABLE IF NOT EXISTS registrations (
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
);

-- Insert sample data (optional - for testing purposes)
INSERT INTO registrations (name, email, phone, college, department, year, tracks, skill_level, file_path) VALUES
('John Doe', 'john.doe@example.com', '9876543210', 'ABC Engineering College', 'Computer Science', '3rd', 'Web Development, AI/ML', 'Intermediate', NULL),
('Jane Smith', 'jane.smith@example.com', '9876543211', 'XYZ Institute of Technology', 'Information Technology', '2nd', 'Cybersecurity, IoT', 'Beginner', NULL),
('Mike Johnson', 'mike.johnson@example.com', '9876543212', 'DEF University', 'Electronics', '4th', 'IoT, UI/UX', 'Advanced', NULL),
('Sarah Wilson', 'sarah.wilson@example.com', '9876543213', 'GHI College of Engineering', 'Computer Science', '1st', 'Web Development, UI/UX', 'Beginner', NULL),
('David Brown', 'david.brown@example.com', '9876543214', 'JKL Technical Institute', 'Software Engineering', '3rd', 'AI/ML, Cybersecurity', 'Intermediate', NULL);

-- Show table structure
DESCRIBE registrations;

-- Show sample data
SELECT * FROM registrations;