// Custom JavaScript for Campus Tech Workshop & Hackathon Portal

$(document).ready(function() {
    
    // Smooth scrolling for navigation links
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 70
            }, 1000);
        }
    });

    // Fade-in animation for cards on scroll
    function animateOnScroll() {
        $('.card-hover').each(function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('fade-in');
            }
        });
    }

    // Trigger animation on scroll
    $(window).on('scroll', animateOnScroll);
    animateOnScroll(); // Initial check

    // Form validation
    $('#registrationForm').on('submit', function(event) {
        var isValid = true;
        
        // Clear previous validation states
        $('.form-control, .form-select').removeClass('is-valid is-invalid');
        $('.invalid-feedback').text('');

        // Validate required fields
        var requiredFields = ['name', 'email', 'phone', 'college', 'department', 'year'];
        
        requiredFields.forEach(function(fieldName) {
            var field = $('#' + fieldName);
            var value = field.val().trim();
            
            if (value === '') {
                field.addClass('is-invalid');
                field.siblings('.invalid-feedback').text('This field is required.');
                isValid = false;
            } else {
                field.addClass('is-valid');
            }
        });

        // Validate email format
        var email = $('#email').val().trim();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (email !== '' && !emailRegex.test(email)) {
            $('#email').addClass('is-invalid').removeClass('is-valid');
            $('#email').siblings('.invalid-feedback').text('Please enter a valid email address.');
            isValid = false;
        }

        // Validate phone number (basic validation)
        var phone = $('#phone').val().trim();
        var phoneRegex = /^[0-9]{10,15}$/;
        
        if (phone !== '' && !phoneRegex.test(phone.replace(/[\s\-\(\)]/g, ''))) {
            $('#phone').addClass('is-invalid').removeClass('is-valid');
            $('#phone').siblings('.invalid-feedback').text('Please enter a valid phone number (10-15 digits).');
            isValid = false;
        }

        // Validate tracks (at least one checkbox must be selected)
        var tracksSelected = $('input[name="tracks[]"]:checked').length;
        
        if (tracksSelected === 0) {
            $('#tracks-error').text('Please select at least one track.');
            $('#tracks-error').show();
            isValid = false;
        } else {
            $('#tracks-error').hide();
        }

        // Validate skill level (radio button)
        var skillSelected = $('input[name="skill_level"]:checked').length;
        
        if (skillSelected === 0) {
            $('#skill-error').text('Please select your skill level.');
            $('#skill-error').show();
            isValid = false;
        } else {
            $('#skill-error').hide();
        }

        // Validate file upload (optional but check file type and size if uploaded)
        var fileInput = $('#file')[0];
        if (fileInput.files.length > 0) {
            var file = fileInput.files[0];
            var allowedTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];
            var maxSize = 5 * 1024 * 1024; // 5MB

            if (!allowedTypes.includes(file.type)) {
                $('#file').addClass('is-invalid');
                $('#file').siblings('.invalid-feedback').text('Only PDF, JPG, JPEG, PNG files are allowed.');
                isValid = false;
            } else if (file.size > maxSize) {
                $('#file').addClass('is-invalid');
                $('#file').siblings('.invalid-feedback').text('File size must be less than 5MB.');
                isValid = false;
            } else {
                $('#file').addClass('is-valid');
            }
        }

        // Prevent form submission if validation fails
        if (!isValid) {
            event.preventDefault();
            
            // Scroll to first error
            var firstError = $('.is-invalid').first();
            if (firstError.length) {
                $('html, body').animate({
                    scrollTop: firstError.offset().top - 100
                }, 500);
            }

            // Show error alert
            showAlert('Please correct the errors below and try again.', 'danger');
        } else {
            // Show loading state
            var submitBtn = $(this).find('button[type="submit"]');
            var originalText = submitBtn.html();
            submitBtn.html('<span class="loading"></span> Submitting...').prop('disabled', true);
            
            // Re-enable button after 10 seconds (fallback)
            setTimeout(function() {
                submitBtn.html(originalText).prop('disabled', false);
            }, 10000);
        }
    });

    // Real-time validation for email
    $('#email').on('blur', function() {
        var email = $(this).val().trim();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (email !== '') {
            if (emailRegex.test(email)) {
                $(this).addClass('is-valid').removeClass('is-invalid');
                $(this).siblings('.invalid-feedback').text('');
            } else {
                $(this).addClass('is-invalid').removeClass('is-valid');
                $(this).siblings('.invalid-feedback').text('Please enter a valid email address.');
            }
        }
    });

    // Real-time validation for phone
    $('#phone').on('blur', function() {
        var phone = $(this).val().trim();
        var phoneRegex = /^[0-9]{10,15}$/;
        
        if (phone !== '') {
            if (phoneRegex.test(phone.replace(/[\s\-\(\)]/g, ''))) {
                $(this).addClass('is-valid').removeClass('is-invalid');
                $(this).siblings('.invalid-feedback').text('');
            } else {
                $(this).addClass('is-invalid').removeClass('is-valid');
                $(this).siblings('.invalid-feedback').text('Please enter a valid phone number.');
            }
        }
    });

    // Track selection validation
    $('input[name="tracks[]"]').on('change', function() {
        var tracksSelected = $('input[name="tracks[]"]:checked').length;
        
        if (tracksSelected > 0) {
            $('#tracks-error').hide();
        }
    });

    // Skill level validation
    $('input[name="skill_level"]').on('change', function() {
        $('#skill-error').hide();
    });

    // File upload preview and validation
    $('#file').on('change', function() {
        var fileInput = this;
        var file = fileInput.files[0];
        
        if (file) {
            var allowedTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];
            var maxSize = 5 * 1024 * 1024; // 5MB
            
            if (!allowedTypes.includes(file.type)) {
                $(this).addClass('is-invalid').removeClass('is-valid');
                $(this).siblings('.invalid-feedback').text('Only PDF, JPG, JPEG, PNG files are allowed.');
            } else if (file.size > maxSize) {
                $(this).addClass('is-invalid').removeClass('is-valid');
                $(this).siblings('.invalid-feedback').text('File size must be less than 5MB.');
            } else {
                $(this).addClass('is-valid').removeClass('is-invalid');
                $(this).siblings('.invalid-feedback').text('');
                
                // Show file info
                var fileInfo = 'Selected: ' + file.name + ' (' + formatFileSize(file.size) + ')';
                $(this).siblings('.form-text').text(fileInfo);
            }
        }
    });

    // Navbar background change on scroll
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.navbar').addClass('scrolled');
        } else {
            $('.navbar').removeClass('scrolled');
        }
    });

    // Auto-dismiss alerts after 5 seconds
    $('.alert').each(function() {
        var alert = $(this);
        setTimeout(function() {
            alert.fadeOut();
        }, 5000);
    });

    // Helper function to show alerts
    function showAlert(message, type) {
        var alertHtml = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
                       '<i class="fas fa-exclamation-triangle me-2"></i>' + message +
                       '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                       '</div>';
        
        // Remove existing alerts
        $('.alert').remove();
        
        // Add new alert at the top of the form
        $('#registrationForm').prepend(alertHtml);
        
        // Scroll to alert
        $('html, body').animate({
            scrollTop: $('#registrationForm').offset().top - 100
        }, 500);
    }

    // Helper function to format file size
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        
        var k = 1024;
        var sizes = ['Bytes', 'KB', 'MB', 'GB'];
        var i = Math.floor(Math.log(bytes) / Math.log(k));
        
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    // Add loading animation to buttons on click
    $('.btn').on('click', function() {
        var btn = $(this);
        if (!btn.hasClass('no-loading')) {
            var originalText = btn.html();
            btn.data('original-text', originalText);
            
            setTimeout(function() {
                if (btn.data('original-text')) {
                    btn.html(btn.data('original-text'));
                }
            }, 2000);
        }
    });

    // Initialize tooltips if Bootstrap tooltips are available
    if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }

    // Form field focus effects
    $('.form-control, .form-select').on('focus', function() {
        $(this).parent().addClass('focused');
    }).on('blur', function() {
        $(this).parent().removeClass('focused');
    });

    // Character counter for text inputs (optional enhancement)
    $('input[type="text"], textarea').on('input', function() {
        var maxLength = $(this).attr('maxlength');
        if (maxLength) {
            var currentLength = $(this).val().length;
            var counter = $(this).siblings('.char-counter');
            
            if (counter.length === 0) {
                counter = $('<small class="char-counter text-muted"></small>');
                $(this).after(counter);
            }
            
            counter.text(currentLength + '/' + maxLength);
            
            if (currentLength > maxLength * 0.9) {
                counter.addClass('text-warning').removeClass('text-muted');
            } else {
                counter.addClass('text-muted').removeClass('text-warning');
            }
        }
    });

    console.log('Campus Tech Workshop & Hackathon Portal - JavaScript loaded successfully!');
});