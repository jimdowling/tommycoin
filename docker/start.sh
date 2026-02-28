#!/bin/sh
set -e

# Run migrations (safe with SQLite)
php artisan migrate --force

# Optimise
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM in background, then nginx in foreground
php-fpm -D
nginx -g "daemon off;"
