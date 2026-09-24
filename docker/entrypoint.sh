#!/bin/sh

# Set correct permissions just in case
chown -R www-data:www-data /var/www/html/storage
chmod -R 775 /var/www/html/storage

# Run Laravel optimizations
echo "Running optimizations..."
php artisan optimize:clear
php artisan optimize

# Run database migrations (will skip if already up to date)
# Force flag is required in production
echo "Running database migrations..."
php artisan migrate --force

# Start Supervisor (which starts Nginx and PHP-FPM)
echo "Starting Supervisord..."
exec /usr/bin/supervisord -c /etc/supervisord.conf
