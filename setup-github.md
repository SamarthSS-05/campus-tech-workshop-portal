# GitHub Setup Commands

Run these commands in your project directory:

```bash
# Initialize Git repository
git init

# Add all files
git add .

# Create initial commit
git commit -m "Initial commit: Campus Tech Workshop Portal"

# Set main branch
git branch -M main

# Add your GitHub repository (replace with your actual repo URL)
git remote add origin https://github.com/YOUR_USERNAME/campus-tech-workshop-portal.git

# Push to GitHub
git push -u origin main
```

## Create GitHub Repository

1. Go to [github.com](https://github.com)
2. Click "New repository"
3. Name: `campus-tech-workshop-portal`
4. Description: `Campus Tech Workshop & Hackathon Registration Portal`
5. Make it Public
6. Don't initialize with README (we already have one)
7. Click "Create repository"
8. Copy the repository URL and use it in the commands above

## Deploy to Vercel

1. Go to [vercel.com](https://vercel.com)
2. Sign up/Login with GitHub
3. Click "New Project"
4. Import your GitHub repository
5. Configure environment variables (see DEPLOYMENT.md)
6. Deploy!