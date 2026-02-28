FROM php:8.2-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    nginx \
    curl \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    sqlite \
    sqlite-dev \
    oniguruma-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_sqlite zip gd mbstring

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy application files
COPY . .

# Create all required Laravel directories
RUN mkdir -p \
    storage/framework/sessions \
    storage/framework/views \
    storage/framework/cache/data \
    storage/logs \
    bootstrap/cache \
    database

# Install dependencies with scripts so package:discover runs
RUN composer install --no-dev --no-interaction

# Setup .env and generate app key
RUN cp .env.example .env \
    && php artisan key:generate --force \
    && php artisan package:discover --ansi

# Create SQLite database
RUN touch database/database.sqlite

# Fix permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Nginx config
COPY docker/nginx.conf /etc/nginx/nginx.conf

# PHP-FPM pool config (passes env vars through, logs errors to stderr)
COPY docker/fpm-pool.conf /usr/local/etc/php-fpm.d/www.conf

EXPOSE 8000

# Start script
COPY docker/start.sh /start.sh
RUN chmod +x /start.sh

CMD ["/start.sh"]
