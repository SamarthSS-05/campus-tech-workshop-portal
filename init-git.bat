@echo off
echo Initializing Git repository for Campus Tech Workshop Portal...

git init
git add .
git commit -m "Initial commit: Campus Tech Workshop Portal"
git branch -M main

echo.
echo Repository initialized successfully!
echo.
echo Next steps:
echo 1. Create a new repository on GitHub
echo 2. Copy the repository URL
echo 3. Run: git remote add origin YOUR_GITHUB_REPO_URL
echo 4. Run: git push -u origin main
echo.
pause