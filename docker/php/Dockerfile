FROM php:7.1-cli

# Latest git to avoid `unable to look up current user in the passwd file` error.
RUN echo "deb http://ftp.us.debian.org/debian testing main contrib non-free" >> /etc/apt/sources.list
RUN apt-get update && apt-get install -y \
        librtmp1 \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        git \
        zlib1g-dev \
        g++ \
        libicu-dev

# Install intl
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# Install bcmath
RUN docker-php-ext-install bcmath

# Install bz2
RUN apt-get install -y libbz2-dev
RUN docker-php-ext-install zip

# Install mbstring
RUN docker-php-ext-install mbstring

# Install mcrypt
RUN docker-php-ext-install -j$(nproc) iconv mcrypt

# Install xdebug
RUN pecl install -o -f xdebug \
    && rm -rf /tmp/pear

RUN docker-php-ext-enable xdebug

COPY docker-xdebug.ini /usr/local/etc/php/conf.d/
COPY docker-local.ini /usr/local/etc/php/conf.d/

CMD ["php", "-a"]
