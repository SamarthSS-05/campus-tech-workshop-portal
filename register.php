<?php
include 'config.php';

$success = false;
$error = "";
$registration_data = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $college = mysqli_real_escape_string($conn, trim($_POST['college']));
    $department = mysqli_real_escape_string($conn, trim($_POST['department']));
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $skill_level = mysqli_real_escape_string($conn, $_POST['skill_level']);
    
    // Handle tracks (checkboxes)
    $tracks = "";
    if (isset($_POST['tracks']) && is_array($_POST['tracks'])) {
        $tracks = implode(", ", $_POST['tracks']);
    }
    
    // Server-side validation
    if (empty($name) || empty($email) || empty($phone) || empty($college) || 
        empty($department) || empty($year) || empty($skill_level) || empty($tracks)) {
        $error = "All required fields must be filled.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        // Handle file upload
        $file_path = "";
        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
            $upload_dir = "uploads/";
            $file_name = $_FILES['file']['name'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            
            // Validate file
            $allowed_ext = array('pdf', 'jpg', 'jpeg', 'png');
            $max_size = 5 * 1024 * 1024; // 5MB
            
            if (!in_array($file_ext, $allowed_ext)) {
                $error = "Invalid file format. Only PDF, JPG, JPEG, PNG allowed.";
            } elseif ($file_size > $max_size) {
                $error = "File size too large. Maximum 5MB allowed.";
            } else {
                // Generate unique filename
                $unique_name = time() . "_" . $file_name;
                $file_path = $upload_dir . $unique_name;
                
                if (!move_uploaded_file($file_tmp, $file_path)) {
                    $error = "Failed to upload file.";
                }
            }
        }
        
        // Insert into database if no errors
        if (empty($error)) {
            $sql = "INSERT INTO registrations (name, email, phone, college, department, year, tracks, skill_level, file_path) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssss", $name, $email, $phone, $college, $department, $year, $tracks, $skill_level, $file_path);
            
            if ($stmt->execute()) {
                $success = true;
                $registration_data = array(
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'college' => $college,
                    'department' => $department,
                    'year' => $year,
                    'tracks' => $tracks,
                    'skill_level' => $skill_level,
                    'file_path' => $file_path,
                    'id' => $conn->insert_id
                );
            } else {
                $error = "Database error: " . $conn->error;
            }
            
            $stmt->close();
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status - Campus Tech Workshop & Hackathon Portal</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="fas fa-code me-2"></i>Tech Portal
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="index.php">Home</a>
                <a class="nav-link" href="view_registrations.php">View Registrations</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <?php if ($success): ?>
                    <!-- Success Message -->
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <strong>Registration Successful!</strong> Your registration has been submitted successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>

                    <!-- Display Registration Details -->
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0"><i class="fas fa-user-check me-2"></i>Registration Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="text-muted">Registration ID</h6>
                                    <p class="fw-bold">#<?php echo $registration_data['id']; ?></p>
                                    
                                    <h6 class="text-muted">Full Name</h6>
                                    <p><?php echo htmlspecialchars($registration_data['name']); ?></p>
                                    
                                    <h6 class="text-muted">Email</h6>
                                    <p><?php echo htmlspecialchars($registration_data['email']); ?></p>
                                    
                                    <h6 class="text-muted">Phone</h6>
                                    <p><?php echo htmlspecialchars($registration_data['phone']); ?></p>
                                    
                                    <h6 class="text-muted">College/Institution</h6>
                                    <p><?php echo htmlspecialchars($registration_data['college']); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">Department</h6>
                                    <p><?php echo htmlspecialchars($registration_data['department']); ?></p>
                                    
                                    <h6 class="text-muted">Year of Study</h6>
                                    <p><?php echo htmlspecialchars($registration_data['year']); ?></p>
                                    
                                    <h6 class="text-muted">Selected Tracks</h6>
                                    <p><?php echo htmlspecialchars($registration_data['tracks']); ?></p>
                                    
                                    <h6 class="text-muted">Skill Level</h6>
                                    <p><?php echo htmlspecialchars($registration_data['skill_level']); ?></p>
                                    
                                    <?php if (!empty($registration_data['file_path'])): ?>
                                    <h6 class="text-muted">Uploaded File</h6>
                                    <p><a href="<?php echo htmlspecialchars($registration_data['file_path']); ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-download me-1"></i>View File
                                    </a></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="alert alert-info mt-3">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>What's Next?</strong> You will receive a confirmation email with event details and further instructions within 24 hours.
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="index.php" class="btn btn-primary me-3">
                            <i class="fas fa-home me-2"></i>Back to Home
                        </a>
                        <a href="view_registrations.php" class="btn btn-outline-secondary">
                            <i class="fas fa-list me-2"></i>View All Registrations
                        </a>
                    </div>

                <?php elseif (!empty($error)): ?>
                    <!-- Error Message -->
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Registration Failed!</strong> <?php echo htmlspecialchars($error); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>

                    <div class="text-center">
                        <a href="index.php#register" class="btn btn-primary">
                            <i class="fas fa-arrow-left me-2"></i>Try Again
                        </a>
                    </div>

                <?php else: ?>
                    <!-- No POST data -->
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        No registration data received. Please fill out the registration form.
                    </div>
                    
                    <div class="text-center">
                        <a href="index.php#register" class="btn btn-primary">
                            <i class="fas fa-user-plus me-2"></i>Go to Registration Form
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2024 Campus Tech Workshop & Hackathon Portal. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>