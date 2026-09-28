FROM php:8.2-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends libjpeg62-turbo-dev libpng-dev libfreetype6-dev unzip \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install gd pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN a2enmod rewrite

# usa o mesmo uid do usuário do host para que o apache consiga gravar em uploads/ no volume
ARG UID=1000
RUN usermod -u ${UID} www-data && groupmod -g ${UID} www-data

COPY docker/php.ini /usr/local/etc/php/conf.d/app.ini
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
