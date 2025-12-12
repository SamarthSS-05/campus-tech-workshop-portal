@echo off
echo ========================================
echo Campus Tech Workshop Portal Deployment
echo ========================================
echo.

echo Step 1: Your Git repository is ready!
echo Step 2: Go to https://github.com/new
echo Step 3: Create repository named: campus-tech-workshop-portal
echo Step 4: Copy the repository URL
echo.

set /p repo_url="Paste your GitHub repository URL here: "

echo.
echo Adding remote origin...
git remote add origin %repo_url%

echo.
echo Pushing to GitHub...
git push -u origin main

echo.
echo ========================================
echo SUCCESS! Repository pushed to GitHub
echo ========================================
echo.
echo Next: Deploy to Vercel
echo 1. Go to https://vercel.com
echo 2. Import your GitHub repository
echo 3. Set environment variables for database
echo 4. Deploy!
echo.
pause