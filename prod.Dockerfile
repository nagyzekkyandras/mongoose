FROM php:8.2-apache

RUN apt-get update && \
    apt-get install -y libpq-dev git libldap2-dev && \
    docker-php-ext-install pdo pdo_pgsql ldap

# composer install
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Use the default production configuration
COPY php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/html

COPY ./app /var/www/html

RUN composer install

USER 1001