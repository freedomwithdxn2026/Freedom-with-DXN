# Grow with DXN — Freedom with DXN

DXN product e-commerce website with admin panel, blog, and distributor network features.

## Tech Stack

- **Frontend:** React (Vite) with Tailwind CSS — `client/`
- **Backend (active):** Node.js / Express / MongoDB — `server/`
- **Backend (WIP):** Laravel / MySQL migration in progress — `laravel-server/`
- **Auth:** JWT (stateless) — bcryptjs for password hashing
- **Database:** MongoDB Atlas in production

## Project Structure

```
client/               # React frontend (Vite)
  src/pages/          # Route pages (Home, Products, AdminPanel, Blog, etc.)
  src/components/     # Reusable components (ProductCard, etc.)
  src/context/        # React contexts (LanguageContext for EN/AR)
server/               # Node.js backend
  routes/             # auth, products, orders, blog, distributors, siteSettings
  models/             # Mongoose models (User, Product, Order, Blog, etc.)
  controllers/        # Business logic
  middleware/          # auth (JWT), admin role check
laravel-server/       # Laravel backend (migration in progress)
```

## Production

- **URL:** https://freedomwithdxn.com
- **Hosting:** cPanel (shared hosting)
- **App path on server:** `/home/freedomw/public_html`
- **Node env:** cPanel Node.js App (Setup Node.js App in cPanel)
- **Database:** MongoDB Atlas (connection string in cPanel env vars)
- **Deploy:** `git pull origin main` in cPanel Terminal, then restart via cPanel Node.js App UI

## API Routes

All API routes are prefixed with `/api/`:
- `/api/auth` — login, register, fix-admin, create-admin, users
- `/api/products` — CRUD for products
- `/api/orders` — order management
- `/api/blog` — blog posts
- `/api/distributors` — distributor network
- `/api/site-settings` — site configuration

## Key Product Fields

Products have `landingPage` and `landingImage` fields. When `landingPage` is set on a product, clicking the ProductCard links to that landing page URL instead of the default product detail page.

## Admin Access

- Admin route: `/admin`
- Login: `/login`
- Admin user is created via `GET /api/auth/fix-admin` (temporary route — remove after use)

## Commands

```bash
# Local development
cd client && npm run dev        # Frontend on :5173
cd server && node server.js     # Backend on :5000

# Production deploy
# In cPanel Terminal:
cd ~/public_html && git pull origin main
# Then restart app via cPanel > Setup Node.js App > Restart
```

## Notes

- The site supports English and Arabic (language toggle in navbar)
- Product categories: coffee, ganoderma, supplements, skincare, beverages, personal-care, other
- WhatsApp ordering via `https://wa.me/message/EFSQ2IDNVG3YB1`
- Landing pages (e.g., `index-ganozhi-lipstick.html`) are standalone HTML pages for specific products
