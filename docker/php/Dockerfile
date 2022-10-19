FROM php:8.1-fpm

RUN apt-get update && apt-get install -y git unzip zip

RUN docker-php-ext-install pdo pdo_mysql mysqli

ENV COMPOSER_HOME=/root/.composer

# Create Composer directory (cache and auth files) & Get Composer
RUN mkdir -p $COMPOSER_HOME \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy *.ini files on $PHP/conf.d/ dir
COPY ./conf.d/*.ini $PHP_INI_DIR/conf.d/