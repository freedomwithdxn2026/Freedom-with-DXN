# Grow with DXN - Full Stack E-commerce Platform

A modern, conversion-optimized e-commerce platform for DXN products with admin panel, user authentication, and dynamic content management.

## 🚀 Quick Deploy

### Option 1: Docker (Recommended)

1. **Clone and setup:**
   ```bash
   git clone <your-repo-url>
   cd grow-with-dxn
   cp .env.example .env
   # Edit .env with your values
   ```

2. **Deploy with Docker Compose:**
   ```bash
   docker-compose up -d
   ```

3. **Access your app:**
   - Frontend: http://localhost:5000
   - API: http://localhost:5000/api/health

### Option 2: Manual Deployment

1. **Install dependencies:**
   ```bash
   npm run install:all
   ```

2. **Build for production:**
   ```bash
   npm run build
   ```

3. **Start the server:**
   ```bash
   npm start
   ```

## 🏗️ Architecture

- **Frontend:** React + Vite + Tailwind CSS
- **Backend:** Node.js + Express + MongoDB
- **Features:** Admin panel, user auth, product management, image uploads

## 📋 Environment Variables

Copy `.env.example` to `.env` and fill in:

- `MONGODB_URI`: Your MongoDB connection string
- `JWT_SECRET`: Random secret for JWT tokens
- `EMAIL_USER/EMAIL_PASS`: Gmail credentials for notifications
- `CLIENT_URL`: Your production domain

## 🌐 Deployment Platforms

### Railway
```bash
npm install -g @railway/cli
railway login
railway init
railway up
```

### Render
1. Connect GitHub repo
2. Set build command: `npm run build`
3. Set start command: `npm start`
4. Add environment variables

### DigitalOcean App Platform
1. Connect repo
2. Set runtime: Node.js
3. Add environment variables
4. Deploy

## 🔧 Development

```bash
# Install all dependencies
npm run install:all

# Start development servers
npm run dev

# Build for production
npm run build
```

## 📱 Features

- ✅ Product landing pages with dynamic images
- ✅ Admin panel for content management
- ✅ User authentication & authorization
- ✅ Responsive design
- ✅ Image upload functionality
- ✅ Blog system
- ✅ Order management

## 🤝 Contributing

1. Fork the repository
2. Create feature branch
3. Commit changes
4. Push to branch
5. Create Pull Request

---

**Made with ❤️ for DXN distributors worldwide**