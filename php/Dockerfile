# Dockerfile Local


# FROM php:8.2-apache

# COPY ./docker-php.conf /etc/apache2/conf-available/docker-php.conf

# RUN a2enmod rewrite

# Dockerfile Producción

FROM php:8.2-apache

COPY ./php/docker-php.conf /etc/apache2/conf-available/docker-php.conf
COPY ./phpFile /var/www/html

RUN a2enmod rewrite
