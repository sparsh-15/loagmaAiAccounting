# Laravel + PHP Backend Setup Guide

This guide explains how to set up the Invoice OCR Enterprise Laravel backend while preserving the project folder structure.

## Prerequisites

- **PHP 8.2+** – [php.net/downloads](https://www.php.net/downloads)
- **Composer** – [getcomposer.org](https://getcomposer.org/)
- **MySQL 8** or **PostgreSQL** (or SQLite for local dev)
- **Node.js** (optional, for frontend assets)

## 1. Install PHP

### Windows
- Download PHP from [windows.php.net](https://windows.php.net/download/)
- Extract to `C:\php` (or your preferred path)
- Add `C:\php` to your system `PATH`
- Enable extensions in `php.ini`: `extension=pdo_mysql`, `extension=mbstring`, `extension=openssl`, `extension=fileinfo`, `extension=curl`

### macOS
```bash
brew install php@8.2
```

### Linux (Ubuntu/Debian)
```bash
sudo apt update
sudo apt install php8.2 php8.2-cli php8.2-mbstring php8.2-xml php8.2-mysql php8.2-curl
```

## 2. Install Composer

```bash
# Download and install (see getcomposer.org for latest)
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"
```

Verify:
```bash
php -v    # PHP 8.2+
composer -v
```

## 3. Project Setup

The backend folder structure is already in place. Run these from the project root:

```bash
# Navigate to backend
cd backend

# Install dependencies (if composer install fails, see Troubleshooting below)
composer install

# Copy environment file
copy .env.example .env   # Windows
# cp .env.example .env   # Linux/macOS

# Generate application key
php artisan key:generate

# Create database (MySQL example)
mysql -u root -p -e "CREATE DATABASE invoice_ocr_enterprise;"

# Configure .env with your DB credentials
# Edit .env: DB_DATABASE, DB_USERNAME, DB_PASSWORD

# Run migrations (create migrations first if needed)
php artisan migrate
```

**If `composer install` fails with "Target class [files] does not exist":**  
This project uses a workaround: Sanctum is loaded manually (not via discovery) so framework providers load first. If you still see the error:
1. Delete `backend/bootstrap/cache/packages.php` and `backend/bootstrap/cache/services.php`
2. Run: `composer dump-autoload` (run terminal as Administrator on Windows if you get "Access is denied")

## 4. Folder Structure (Preserved)

```
backend/
├── app/
│   ├── Http/
│   │   ├── Controllers/   # AuthController, InvoiceController, OCRController, etc.
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Services/          # OCRService, AIService, ValidationService, etc.
│   ├── Models/            # Invoice, Vendor, Industry, LineItem, AuditLog
│   └── Jobs/              # ProcessInvoiceJob, RunOCRJob
├── config/
│   ├── ocr.php            # OCR provider config
│   ├── ai.php             # AI/LLM config
│   ├── industries.php     # Industry schemas
│   └── security.php       # Rate limits, file validation
├── routes/
│   ├── api.php
│   └── web.php
├── storage/
│   ├── invoices/          # Uploaded invoice images
│   ├── ocr_raw/           # Raw OCR output
│   └── ai_structured/     # AI-extracted JSON
└── artisan
```

## 5. Run the Server

```bash
cd backend
php artisan serve
```

API base URL: `http://127.0.0.1:8000/api`

## 6. Optional: Queue Worker (for async OCR jobs)

```bash
php artisan queue:work
```

## 7. Environment Variables

| Variable | Description |
|----------|-------------|
| `OCR_DRIVER` | `tesseract` or cloud provider |
| `OCR_CLOUD_API_KEY` | API key for Google/AWS OCR |
| `OPENAI_API_KEY` | For AI structuring |
| `API_RATE_LIMIT` | Requests per minute |
| `MAX_INVOICE_FILE_SIZE_MB` | Max upload size |

## Troubleshooting

- **Composer not found**: Ensure PHP and Composer are in your system `PATH`
- **PHP not found**: Add PHP to your system `PATH` (e.g. `C:\php` on Windows)
- **Target class [files] does not exist**: Ensure all config files exist (`config/filesystems.php`, `config/cache.php`, etc.) and `config/app.php` includes `ServiceProvider::defaultProviders()`
- **Permission denied (storage)**: `chmod -R 775 storage bootstrap/cache` (Linux/macOS) or run as Administrator (Windows)
- **Class not found**: Run `composer dump-autoload`
- **500 error**: Check `storage/logs/laravel.log` and `.env` configuration
