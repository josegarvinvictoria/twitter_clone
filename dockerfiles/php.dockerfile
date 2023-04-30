FROM php:8.0-fpm-alpine

WORKDIR /var/www/html

COPY src .

RUN apk update && \
    apk add --no-cache npm  \
    && docker-php-ext-install pdo pdo_mysql

RUN chown -R www-data:www-data /var/www/html