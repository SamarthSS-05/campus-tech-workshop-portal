<?php
include 'config.php';

// Fetch all registrations
$sql = "SELECT * FROM registrations ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Registrations - Campus Tech Workshop & Hackathon Portal</title>
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
                <a class="nav-link" href="index.php#register">Register</a>
                <a class="nav-link active" href="view_registrations.php">View Registrations</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5 pt-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2><i class="fas fa-users me-2"></i>Event Registrations</h2>
                    <span class="badge bg-primary fs-6">
                        Total: <?php echo $result->num_rows; ?> registrations
                    </span>
                </div>

                <!-- Search Box -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" id="searchInput" placeholder="Search by name, email, or track...">
                        </div>
                    </div>
                </div>

                <?php if ($result->num_rows > 0): ?>
                    <!-- Registrations Table -->
                    <div class="card shadow">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="registrationsTable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>College</th>
                                            <th>Department</th>
                                            <th>Year</th>
                                            <th>Tracks</th>
                                            <th>Skill Level</th>
                                            <th>File</th>
                                            <th>Registered At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td><span class="badge bg-secondary">#<?php echo $row['id']; ?></span></td>
                                            <td class="fw-bold"><?php echo htmlspecialchars($row['name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                            <td><?php echo htmlspecialchars($row['college']); ?></td>
                                            <td><?php echo htmlspecialchars($row['department']); ?></td>
                                            <td><?php echo htmlspecialchars($row['year']); ?></td>
                                            <td>
                                                <?php 
                                                $tracks = explode(', ', $row['tracks']);
                                                foreach($tracks as $track): 
                                                ?>
                                                    <span class="badge bg-info me-1"><?php echo htmlspecialchars($track); ?></span>
                                                <?php endforeach; ?>
                                            </td>
                                            <td>
                                                <?php
                                                $skill_color = '';
                                                switch($row['skill_level']) {
                                                    case 'Beginner': $skill_color = 'success'; break;
                                                    case 'Intermediate': $skill_color = 'warning'; break;
                                                    case 'Advanced': $skill_color = 'danger'; break;
                                                }
                                                ?>
                                                <span class="badge bg-<?php echo $skill_color; ?>"><?php echo htmlspecialchars($row['skill_level']); ?></span>
                                            </td>
                                            <td>
                                                <?php if (!empty($row['file_path'])): ?>
                                                    <a href="<?php echo htmlspecialchars($row['file_path']); ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <span class="text-muted">No file</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo date('M j, Y g:i A', strtotime($row['created_at'])); ?></td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="row mt-4">
                        <?php
                        // Reset result pointer and calculate statistics
                        $result->data_seek(0);
                        $track_counts = array();
                        $skill_counts = array('Beginner' => 0, 'Intermediate' => 0, 'Advanced' => 0);
                        
                        while($row = $result->fetch_assoc()) {
                            // Count tracks
                            $tracks = explode(', ', $row['tracks']);
                            foreach($tracks as $track) {
                                $track = trim($track);
                                if (!isset($track_counts[$track])) {
                                    $track_counts[$track] = 0;
                                }
                                $track_counts[$track]++;
                            }
                            
                            // Count skill levels
                            if (isset($skill_counts[$row['skill_level']])) {
                                $skill_counts[$row['skill_level']]++;
                            }
                        }
                        ?>
                        
                        <div class="col-md-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5>Most Popular Track</h5>
                                    <?php 
                                    if (!empty($track_counts)) {
                                        $popular_track = array_keys($track_counts, max($track_counts))[0];
                                        echo "<h3>" . htmlspecialchars($popular_track) . "</h3>";
                                        echo "<small>" . $track_counts[$popular_track] . " registrations</small>";
                                    } else {
                                        echo "<h3>No data</h3>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5>Skill Distribution</h5>
                                    <div class="d-flex justify-content-between">
                                        <small>Beginner: <?php echo $skill_counts['Beginner']; ?></small>
                                        <small>Intermediate: <?php echo $skill_counts['Intermediate']; ?></small>
                                        <small>Advanced: <?php echo $skill_counts['Advanced']; ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5>Total Tracks Selected</h5>
                                    <h3><?php echo array_sum($track_counts); ?></h3>
                                    <small>Across all registrations</small>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else: ?>
                    <!-- No Registrations -->
                    <div class="text-center py-5">
                        <i class="fas fa-users fa-5x text-muted mb-3"></i>
                        <h3 class="text-muted">No Registrations Yet</h3>
                        <p class="text-muted">Be the first to register for the event!</p>
                        <a href="index.php#register" class="btn btn-primary">
                            <i class="fas fa-user-plus me-2"></i>Register Now
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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // Search functionality
        $(document).ready(function() {
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#registrationsTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>