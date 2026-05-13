# =========================
# Composer Dependencies
# =========================
FROM composer:2.8 AS vendor

WORKDIR /app

COPY composer.json composer.lock* ./

ENV COMPOSER_PROCESS_TIMEOUT=2000

RUN --mount=type=cache,target=/tmp/composer-cache \
    composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts \
    --ignore-platform-reqs

# =========================
# Frontend Builder
# =========================
FROM node:20-alpine AS frontend

WORKDIR /app

COPY package*.json ./

RUN if [ -f package-lock.json ]; then npm ci; else npm install; fi

COPY . .

RUN npm run build

# =========================
# Production Image
# =========================
FROM php:8.2-fpm-alpine

# Runtime dependencies
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    libpng \
    libzip \
    oniguruma

# Build dependencies
RUN apk add --no-cache --virtual .build-deps \
    $PHPIZE_DEPS \
    libpng-dev \
    libzip-dev \
    oniguruma-dev \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        bcmath \
        exif \
        pcntl \
        gd \
        zip \
    && apk del .build-deps

WORKDIR /var/www/html

# Copy application
COPY . .

# Copy src to public
RUN if [ -d src ]; then \
    cp -r src/* public/; \
fi


# Copy vendor dependencies
COPY --from=vendor /app/vendor ./vendor

# Copy frontend assets
COPY --from=frontend /app/public/build ./public/build

# Laravel permissions
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    /run/nginx \
    /var/log/supervisor \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# Nginx config
COPY docker/nginx/production/takanesia.conf /etc/nginx/http.d/default.conf

# Supervisor config
COPY docker/supervisor/production.conf /etc/supervisor/conf.d/supervisord.conf

# Opcache config
COPY docker/php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

EXPOSE 8080

HEALTHCHECK --interval=30s --timeout=5s --retries=3 \
    CMD curl -f http://127.0.0.1:8080 || exit 1

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]