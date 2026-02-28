#!/bin/sh
set -e

cd /var/www/html

# Clear and rebuild caches at runtime (so APP_KEY env var is available)
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Start PHP-FPM in background, then Nginx in foreground
php-fpm -D
exec nginx -g "daemon off;"
