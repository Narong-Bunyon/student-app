FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install essential system packages and PHP extensions
RUN apk add --no-cache \
    zip \
    unzip \
    curl \
    nginx \
    supervisor \
    sqlite \
    libpng-dev \
    libzip-dev \
    oniguruma-dev \
    && docker-php-ext-install pdo_mysql pdo_sqlite mbstring zip exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . .

# Set proper permissions for Laravel directories
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Install PHP dependencies (production optimization)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Create necessary SQLite database file
RUN touch /var/www/html/database/database.sqlite \
    && chown www-data:www-data /var/www/html/database/database.sqlite

# Configure Nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/default.conf /etc/nginx/http.d/default.conf

# Configure Supervisor (to run Nginx and PHP-FPM together)
COPY docker/supervisord.conf /etc/supervisord.conf

# Copy and set permissions for entrypoint script
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Expose port 80 for web traffic
EXPOSE 80

# Use the entrypoint script to boot
CMD ["/usr/local/bin/entrypoint.sh"]
