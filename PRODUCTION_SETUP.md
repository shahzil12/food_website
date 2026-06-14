# Production Setup Guide - Railway

This guide will help you configure your Food Website application on Railway with proper MySQL database connection.

## Step 1: Add MySQL Add-on to Your Railway Project

1. Go to your Railway project dashboard
2. Click **+ Create** → **Database** → **MySQL**
3. Railway will automatically create a MySQL instance and add database credentials to your environment variables

## Step 2: Configure Environment Variables on Railway

Railway should automatically generate these variables. If not, add them manually:

```
APP_NAME=TastyBytes
APP_ENV=production
APP_KEY=base64:YOUR_KEY_HERE  # Copy from local .env
APP_DEBUG=false
APP_URL=https://foodwebsite-production-27be.up.railway.app

DB_CONNECTION=mysql
DB_HOST=mysql.railway.internal  # Railway's internal MySQL host
DB_PORT=3306
DB_DATABASE=railway  # Default Railway database name
DB_USERNAME=root  # From Railway MySQL service
DB_PASSWORD=YOUR_PASSWORD_HERE  # From Railway MySQL service

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
```

## Step 3: Get Your Database Credentials from Railway

1. Go to Railway Dashboard → Your Project
2. Click on the **MySQL** plugin/service
3. Click **Connect** tab
4. Copy the **MySQL Connection String** or individual credentials:
   - **DB_HOST**: Usually `mysql.railway.internal` (internal) or your public hostname
   - **DB_PORT**: Usually `3306`
   - **DB_DATABASE**: Usually `railway`
   - **DB_USERNAME**: Usually `root`
   - **DB_PASSWORD**: The generated password

5. Add these to your Railway environment variables in the project settings

## Step 4: Deploy and Run Migrations

After pushing code to GitHub:

1. Railway will automatically deploy your app
2. Once deployed, SSH into the production environment OR use Railway CLI to run:

```bash
php artisan migrate --force
php artisan db:seed --force
```

Or add these commands to a deployment script.

## Step 5: Verify Everything Works

- Visit your production URL: `https://foodwebsite-production-27be.up.railway.app`
- Try registering a new account
- Try logging in with seeded credentials:
  - Email: `admin@gmail.com` | Password: `12345678`
  - Email: `user@gmail.com` | Password: `12345678`
  - Email: `delivery@gmail.com` | Password: `12345678`

## Troubleshooting

### Error: "Unknown database 'food_website'"
- Solution: Update `DB_DATABASE` environment variable to match the Railway database name
- Check Railway MySQL service → Connect tab for correct database name

### Error: "No connection could be made"
- Solution: Check `DB_HOST` - use `mysql.railway.internal` for internal connection or public hostname
- Ensure MySQL service is running in Railway dashboard

### Error: "UNIQUE constraint failed: users.email"
- Solution: Clear the database by deleting and recreating the MySQL service in Railway
- Then run migrations and seeding again

### Connection using public hostname instead of internal
If `mysql.railway.internal` doesn't work:
1. Go to MySQL service → Connect tab
2. Use the **public hostname** (like `mysql.railway.internal` or IP)
3. Update `DB_HOST` with the public connection string

## Important Notes

- **Never commit `.env` to GitHub** - only `.env.example`
- **DB_CONNECTION must be `mysql`** - not sqlite
- **SESSION_DRIVER should be `database`** - not file (since Railway resets filesystem)
- **CACHE_STORE should be `database`** - for same reason
- Railway auto-deploys when you push to GitHub

## Local Testing (Before Production)

Make sure everything works locally first:
```bash
php artisan migrate:fresh
php artisan db:seed
php artisan serve
```

Then test registration and login at `http://127.0.0.1:8000`
