# ShopG E-commerce Platform

Monorepo containing Laravel backend and Next.js frontend for the ShopG marketplace.

## Project Structure
- `backend/`: Laravel API handling authentication, orders, catalogs, and admin dashboards.
- `frontend/`: Next.js + React client with home, product, cart, checkout, and admin interfaces.

## Getting Started
1. Configure `.env` for backend (Laravel) and frontend items (Stripe, AWS, etc.).
2. Install backend dependencies (`composer install`) and frontend dependencies (`npm install`).
3. Run migrations and seeders, then start both servers locally.

## Deployment Notes
- Backend: Run `php artisan migrate --seed`, configure Stripe, AWS S3, and reCAPTCHA keys, then deploy to your PHP host.
- Frontend: Build via `npm run build` and host on any static host or Node-enabled server. Ensure API base URLs are set correctly.
