# 🚀 Ready to Deploy!

Your Campus Tech Workshop Portal is now ready for GitHub and Vercel deployment.

## ✅ What's Done:
- Git repository initialized
- All files committed to main branch
- Vercel configuration added
- Environment variables setup
- Database configuration updated for production

## 📋 Next Steps:

### 1. Create GitHub Repository
1. Go to https://github.com/new
2. Repository name: `campus-tech-workshop-portal`
3. Description: `Campus Tech Workshop & Hackathon Registration Portal`
4. Make it **Public**
5. **Don't** initialize with README
6. Click "Create repository"

### 2. Push to GitHub
Copy your repository URL and run:
```bash
git remote add origin https://github.com/YOUR_USERNAME/campus-tech-workshop-portal.git
git push -u origin main
```

### 3. Deploy to Vercel
1. Go to https://vercel.com
2. Sign up/Login with GitHub
3. Click "New Project"
4. Import your GitHub repository
5. Set environment variables:
   - `DB_HOST` = your database host
   - `DB_USER` = your database user
   - `DB_PASS` = your database password
   - `DB_NAME` = your database name
6. Click "Deploy"

### 4. Setup Database
Use PlanetScale (recommended) or any MySQL cloud service:
1. Create database
2. Import `database_schema.sql`
3. Update environment variables in Vercel

## 🎉 Your app will be live at: `your-project.vercel.app`