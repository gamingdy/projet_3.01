FROM php:apache
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /app
COPY . /app
COPY conf/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY conf/apache.conf /etc/apache2/conf-available/z-app.conf
RUN a2enconf z-app

RUN apt update && apt upgrade -y
RUN apt install git unzip -y
RUN docker-php-ext-install pdo pdo_mysql
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN set -eux
RUN composer install

