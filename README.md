# Campus Tech Workshop & Hackathon Portal

A complete web application for student registration to campus tech workshops and hackathon events.

## 📁 Project Structure

```
Campus_Tech_Workshop_Portal/
├── index.php                 # Home page with registration form
├── register.php              # Form processing and success page
├── view_registrations.php    # Admin page to view all registrations
├── config.php                # Database configuration
├── database_schema.sql       # SQL schema and sample data
├── README.md                 # This file
├── assets/
│   ├── css/
│   │   └── style.css        # Custom CSS styles
│   └── js/
│       └── script.js        # Custom JavaScript with jQuery
└── uploads/                  # Directory for uploaded files
```

## 🚀 Features

- **Responsive Design**: Built with Bootstrap 5 for mobile and desktop compatibility
- **Registration Form**: Complete form with validation for student registration
- **File Upload**: Support for PDF/image uploads (abstracts, ID proof)
- **Track Selection**: Multiple checkbox options for different tech tracks
- **Admin Panel**: View all registrations with search functionality
- **Real-time Validation**: Client-side validation using jQuery
- **Success Display**: Formatted display of submitted information
- **Statistics**: Track popularity and skill level distribution

## 🛠 Tech Stack

- **Frontend**: HTML5, CSS3, Bootstrap 5, JavaScript, jQuery
- **Backend**: PHP (vanilla, no frameworks)
- **Database**: MySQL
- **File Handling**: PHP file upload with validation

## 🚀 Quick Deploy to Vercel

1. **Fork/Clone this repository**
2. **Connect to Vercel**: Import your GitHub repository at [vercel.com](https://vercel.com)
3. **Setup Database**: Use PlanetScale, Railway, or any MySQL cloud service
4. **Set Environment Variables** in Vercel dashboard:
   ```
   DB_HOST=your_database_host
   DB_USER=your_database_user
   DB_PASS=your_database_password
   DB_NAME=your_database_name
   ```
5. **Import Database**: Run the SQL from `database_schema.sql`
6. **Deploy**: Your app will be live at `your-project.vercel.app`

📖 **Detailed deployment guide**: See [DEPLOYMENT.md](DEPLOYMENT.md)

## 📋 Local Development Setup

### XAMPP/WAMP Setup

1. **Download and Install XAMPP/WAMP**
   - Download from [XAMPP](https://www.apachefriends.org/) or [WAMP](http://www.wampserver.com/)
   - Install and start Apache and MySQL services

2. **Place Project Files**
   ```
   Copy the entire "Campus_Tech_Workshop_Portal" folder to:
   - XAMPP: C:\xampp\htdocs\
   - WAMP: C:\wamp64\www\
   ```

3. **Create Database**
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Import the `database_schema.sql` file OR run the SQL commands manually:
   
   ```sql
   CREATE DATABASE hackathon_portal;
   USE hackathon_portal;
   
   CREATE TABLE registrations (
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
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

4. **Configure Database Connection**
   - Open `config.php`
   - Update database credentials if needed:
   ```php
   $host = "localhost";
   $user = "root";
   $pass = "";  // Usually empty for XAMPP
   $dbname = "hackathon_portal";
   ```

5. **Set Permissions**
   - Ensure the `uploads/` folder has write permissions
   - On Windows: Right-click → Properties → Security → Edit → Add write permissions

6. **Access the Application**
   - Open browser and go to: `http://localhost/Campus_Tech_Workshop_Portal/`

### Online Hosting (000webhost, InfinityFree, etc.)

1. **Upload Files**
   - Upload all project files to your hosting public_html directory
   - Ensure `uploads/` folder has write permissions (755 or 777)

2. **Create Database**
   - Use hosting control panel to create MySQL database
   - Import `database_schema.sql` through phpMyAdmin

3. **Update Configuration**
   - Edit `config.php` with your hosting database credentials:
   ```php
   $host = "your_db_host";        // Usually localhost or provided by host
   $user = "your_db_username";
   $pass = "your_db_password";
   $dbname = "your_db_name";
   ```

4. **Test the Application**
   - Visit your domain: `http://yourdomain.com/`

## 🎯 Usage

### For Students
1. Visit the homepage
2. Scroll to the registration section
3. Fill out the complete form:
   - Personal information
   - College details
   - Select interested tracks (at least one)
   - Choose skill level
   - Upload file (optional)
4. Submit the form
5. View confirmation with submitted details

### For Administrators
1. Visit `/view_registrations.php`
2. View all registrations in a table format
3. Use search functionality to filter results
4. Download uploaded files
5. View statistics and track popularity

## 🔧 Customization

### Database Configuration
- Modify `config.php` for different database settings
- Update table structure in `database_schema.sql` if needed

### Styling
- Edit `assets/css/style.css` for custom styling
- Modify Bootstrap classes in HTML files
- Update color scheme and fonts

### Functionality
- Add new tracks by updating checkbox options in `index.php`
- Modify form fields as needed
- Update validation rules in `assets/js/script.js`

## 📝 Form Fields

### Required Fields
- Full Name
- Email Address
- Phone Number
- College/Institution
- Department
- Year of Study
- At least one Track selection
- Skill Level

### Available Tracks
- Web Development
- AI/ML
- Cybersecurity
- IoT
- UI/UX
- Mobile Development

### Skill Levels
- Beginner
- Intermediate
- Advanced

## 🔒 Security Features

- Input sanitization using `mysqli_real_escape_string()`
- File upload validation (type and size)
- Client-side and server-side validation
- Prepared statements for database queries
- XSS protection with `htmlspecialchars()`

## 🐛 Troubleshooting

### Common Issues

1. **Database Connection Error**
   - Check database credentials in `config.php`
   - Ensure MySQL service is running
   - Verify database exists

2. **File Upload Not Working**
   - Check `uploads/` folder permissions
   - Verify PHP file upload settings in `php.ini`
   - Ensure folder exists and is writable

3. **Form Not Submitting**
   - Check JavaScript console for errors
   - Verify all required fields are filled
   - Ensure jQuery is loading properly

4. **Styling Issues**
   - Check if Bootstrap CSS is loading
   - Verify custom CSS file path
   - Clear browser cache

### File Permissions
```bash
# For Linux/Mac hosting
chmod 755 uploads/
# or
chmod 777 uploads/  # if 755 doesn't work
```

## 📞 Support

For issues or questions:
1. Check the troubleshooting section above
2. Verify all setup steps were followed correctly
3. Check browser console for JavaScript errors
4. Review PHP error logs for server-side issues

## 📄 License

This project is created for educational purposes. Feel free to modify and use as needed.

---

**Campus Tech Workshop & Hackathon Portal** - Connecting students with technology and innovation! 🚀