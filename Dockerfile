
FROM serversideup/php:8.3-fpm-nginx

COPY --chown=www-data:www-data . /var/www/html
RUN composer install --no-interaction --optimize-autoloader --no-dev
RUN curl -sL https://nodesource.com | bash - \
    && apt-get install -y nodejs \
    && npm install \
    && npm run build
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache