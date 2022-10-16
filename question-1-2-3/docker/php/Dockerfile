FROM php:8.0.24-fpm-alpine3.16 as local

RUN apk update && apk add bash

WORKDIR /var/www
COPY . /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
