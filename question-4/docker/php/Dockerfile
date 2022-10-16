FROM php:8.0.24-fpm-alpine3.16 as local

RUN apk update && apk add bash nodejs npm libpng libpng-dev libjpeg-turbo libjpeg-turbo-dev

RUN docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql

RUN docker-php-ext-configure gd \
      --with-jpeg=/usr/include/ \
    &&  \
    docker-php-ext-install gd

WORKDIR /var/www
COPY . /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
