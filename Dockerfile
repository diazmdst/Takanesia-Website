# --- PHP Dependencies Stage ---
FROM composer:2.6 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --no-dev \
    --prefer-dist

# --- Frontend Assets Stage ---
FROM node:18-alpine AS frontend
WORKDIR /app
COPY package.json package-lock.json* ./
RUN npm ci --quiet
COPY . .
RUN npm run build --quiet

# --- Final Production Image ---
FROM php:8.2-fpm-alpine

# Install system dependencies & Nginx
RUN apk add --no-cache \
    nginx \
    supervisor \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    oniguruma-dev \
    libzip-dev

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Set up working directory
WORKDIR /var/www/html

# Copy application code
COPY --chown=www-data:www-data . .

# Compatibility: Copy src/ files to public/ if they exist (for "not fully Laravel" state)
RUN if [ -d src ]; then cp -rn src/* public/ || true; fi

# Copy composer dependencies
COPY --from=vendor --chown=www-data:www-data /app/vendor ./vendor

# Copy frontend assets
COPY --from=frontend --chown=www-data:www-data /app/public/build ./public/build

# Copy Nginx configuration
COPY docker/nginx/production/takanesia.conf /etc/nginx/http.d/default.conf

# Set up Supervisor to run both PHP-FPM and Nginx
COPY docker/supervisor/production.conf /etc/supervisor/conf.d/supervisord.conf

# Prepare directories and permissions
RUN mkdir -p /var/log/supervisor /var/run/nginx && \
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Security: Set up non-root user (using www-data which already exists in php-fpm image)
# We need to allow www-data to run nginx and supervisor
RUN touch /var/run/nginx.pid && \
    chown -R www-data:www-data /var/run/nginx.pid /var/cache/nginx /var/log/nginx /var/lib/nginx /var/log/supervisor /var/run

USER www-data

# Environment variables (can be overridden)
ENV APP_ENV=production
ENV APP_DEBUG=false

# Expose the port Nginx is listening on
EXPOSE 8080

# Healthcheck
HEALTHCHECK --interval=30s --timeout=5s --start-period=5s --retries=3 \
    CMD curl -f http://localhost:8080/ || exit 1

# Start supervisor to manage PHP-FPM and Nginx
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
