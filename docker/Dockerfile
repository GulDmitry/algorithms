FROM php:7.4-cli

RUN apt-get update && apt-get install -y \
        librtmp1 \
        libonig-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libzip-dev \
        git \
        zlib1g-dev \
        g++ \
        libicu-dev \
        unzip

# Install intl
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# Install bcmath
RUN docker-php-ext-install bcmath

# Install bz2
RUN apt-get install -y libbz2-dev
RUN docker-php-ext-install zip

# Install mbstring
RUN docker-php-ext-install iconv mbstring

# Install xdebug
RUN pecl install -o -f xdebug-beta \
    && rm -rf /tmp/pear

RUN docker-php-ext-enable xdebug

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY xdebug.ini /usr/local/etc/php/conf.d/
COPY local.ini /usr/local/etc/php/conf.d/

WORKDIR /app
