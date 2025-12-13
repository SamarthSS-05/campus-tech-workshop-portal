<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Tech Workshop & Hackathon Portal</title>
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#home">
                <i class="fas fa-code me-2"></i>Tech Portal
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_registrations.php">View Registrations</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4 fade-in">Campus Tech Workshop & Hackathon Portal</h1>
                    <p class="lead mb-4 fade-in">Join the ultimate tech experience! Learn, code, and innovate with fellow students in our comprehensive workshop and hackathon event.</p>
                    <a href="#register" class="btn btn-primary btn-lg me-3 fade-in">
                        <i class="fas fa-rocket me-2"></i>Register Now
                    </a>
                    <a href="#overview" class="btn btn-outline-light btn-lg fade-in">Learn More</a>
                </div>
                <div class="col-lg-6 text-center">
                    <i class="fas fa-laptop-code hero-icon fade-in"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Event Overview -->
    <section id="overview" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center mb-5">
                    <h2 class="fw-bold mb-4">Event Overview</h2>
                    <p class="lead">A 3-day intensive program combining hands-on workshops with an exciting hackathon competition.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm card-hover">
                        <div class="card-body text-center">
                            <i class="fas fa-calendar-alt fa-3x text-primary mb-3"></i>
                            <h5 class="card-title">3-Day Event</h5>
                            <p class="card-text">Intensive workshops followed by 24-hour hackathon challenge</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm card-hover">
                        <div class="card-body text-center">
                            <i class="fas fa-trophy fa-3x text-warning mb-3"></i>
                            <h5 class="card-title">Prizes Worth ₹50,000</h5>
                            <p class="card-text">Amazing prizes for winners and participation certificates for all</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm card-hover">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-3x text-success mb-3"></i>
                            <h5 class="card-title">Expert Mentors</h5>
                            <p class="card-text">Learn from industry professionals and experienced developers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Available Tracks -->
    <section id="tracks" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center mb-5">
                    <h2 class="fw-bold mb-4">Available Tracks</h2>
                    <p class="lead">Choose your area of interest and dive deep into cutting-edge technologies</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm card-hover">
                        <div class="card-body">
                            <i class="fab fa-html5 fa-2x text-danger mb-3"></i>
                            <h5 class="card-title">Web Development</h5>
                            <p class="card-text">Master modern web technologies including React, Node.js, and responsive design</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm card-hover">
                        <div class="card-body">
                            <i class="fas fa-brain fa-2x text-info mb-3"></i>
                            <h5 class="card-title">AI/ML</h5>
                            <p class="card-text">Explore artificial intelligence and machine learning with Python and TensorFlow</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm card-hover">
                        <div class="card-body">
                            <i class="fas fa-shield-alt fa-2x text-success mb-3"></i>
                            <h5 class="card-title">Cybersecurity</h5>
                            <p class="card-text">Learn ethical hacking, penetration testing, and security best practices</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm card-hover">
                        <div class="card-body">
                            <i class="fas fa-microchip fa-2x text-warning mb-3"></i>
                            <h5 class="card-title">IoT</h5>
                            <p class="card-text">Build smart devices and connect them to the internet using Arduino and Raspberry Pi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm card-hover">
                        <div class="card-body">
                            <i class="fas fa-paint-brush fa-2x text-primary mb-3"></i>
                            <h5 class="card-title">UI/UX</h5>
                            <p class="card-text">Design beautiful and user-friendly interfaces using Figma and modern design principles</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm card-hover">
                        <div class="card-body">
                            <i class="fas fa-mobile-alt fa-2x text-secondary mb-3"></i>
                            <h5 class="card-title">Mobile Development</h5>
                            <p class="card-text">Create cross-platform mobile apps using Flutter and React Native</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Form -->
    <section id="register" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white text-center">
                            <h3 class="mb-0"><i class="fas fa-user-plus me-2"></i>Register for the Event</h3>
                        </div>
                        <div class="card-body">
                            <form id="registrationForm" action="register.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Full Name *</label>
                                        <input type="text" class="form-control" id="name" name="name" maxlength="100" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="email" name="email" maxlength="100" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone Number *</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" maxlength="20" pattern="[0-9+\-\s\(\)]{10,20}" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="college" class="form-label">College/Institution *</label>
                                        <input type="text" class="form-control" id="college" name="college" maxlength="150" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="department" class="form-label">Department *</label>
                                        <input type="text" class="form-control" id="department" name="department" maxlength="100" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="year" class="form-label">Year of Study *</label>
                                        <select class="form-select" id="year" name="year" required>
                                            <option value="">Select Year</option>
                                            <option value="1st">1st Year</option>
                                            <option value="2nd">2nd Year</option>
                                            <option value="3rd">3rd Year</option>
                                            <option value="4th">4th Year</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Select Tracks (Choose at least one) *</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="tracks[]" value="Web Development" id="web">
                                                <label class="form-check-label" for="web">Web Development</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="tracks[]" value="AI/ML" id="aiml">
                                                <label class="form-check-label" for="aiml">AI/ML</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="tracks[]" value="Cybersecurity" id="cyber">
                                                <label class="form-check-label" for="cyber">Cybersecurity</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="tracks[]" value="IoT" id="iot">
                                                <label class="form-check-label" for="iot">IoT</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="tracks[]" value="UI/UX" id="uiux">
                                                <label class="form-check-label" for="uiux">UI/UX</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="tracks[]" value="Mobile Development" id="mobile">
                                                <label class="form-check-label" for="mobile">Mobile Development</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback" id="tracks-error"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Skill Level *</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="skill_level" value="Beginner" id="beginner" required>
                                                <label class="form-check-label" for="beginner">Beginner</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="skill_level" value="Intermediate" id="intermediate">
                                                <label class="form-check-label" for="intermediate">Intermediate</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="skill_level" value="Advanced" id="advanced">
                                                <label class="form-check-label" for="advanced">Advanced</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback" id="skill-error"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="file" class="form-label">Upload Abstract PDF or ID Proof</label>
                                    <input type="file" class="form-control" id="file" name="file" accept=".pdf,.jpg,.jpeg,.png">
                                    <div class="form-text">Accepted formats: PDF, JPG, PNG (Max 5MB)</div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-paper-plane me-2"></i>Submit Registration
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2024 Campus Tech Workshop & Hackathon Portal. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
</body>
</html>