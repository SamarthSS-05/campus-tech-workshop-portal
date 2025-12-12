# Deployment Guide

## GitHub Setup

1. **Create GitHub Repository**
   ```bash
   git init
   git add .
   git commit -m "Initial commit: Campus Tech Workshop Portal"
   git branch -M main
   git remote add origin https://github.com/YOUR_USERNAME/campus-tech-workshop-portal.git
   git push -u origin main
   ```

## Vercel Deployment

1. **Connect to Vercel**
   - Go to [vercel.com](https://vercel.com)
   - Sign up/Login with GitHub
   - Click "New Project"
   - Import your GitHub repository

2. **Database Setup**
   - Use a cloud MySQL service like:
     - **PlanetScale** (recommended for Vercel)
     - **Railway**
     - **Aiven**
     - **AWS RDS**

3. **Environment Variables**
   Set these in Vercel dashboard:
   ```
   DB_HOST=your_database_host
   DB_USER=your_database_user
   DB_PASS=your_database_password
   DB_NAME=your_database_name
   ```

4. **Database Schema**
   Run the SQL from `database_schema.sql` in your cloud database

## Alternative: Railway Deployment

1. **Connect to Railway**
   - Go to [railway.app](https://railway.app)
   - Connect GitHub repository
   - Add MySQL database service
   - Set environment variables

## Local Development

```bash
# Clone repository
git clone https://github.com/YOUR_USERNAME/campus-tech-workshop-portal.git
cd campus-tech-workshop-portal

# Copy environment file
cp .env.example .env

# Edit .env with your local database credentials

# Start local server
php -S localhost:8000
```

## File Upload Configuration

For production, ensure the `uploads/` directory has proper write permissions. Some hosting providers may require additional configuration for file uploads.