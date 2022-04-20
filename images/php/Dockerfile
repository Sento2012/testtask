FROM php:7.4-fpm

ARG APCU_VERSION=5.1.18

LABEL Maintainer="Oliver Adria <oliver@adria.dev>" \
      Description="Base setup for web development with PHP and PostgreSQL."

# Get frequently used tools
RUN apt-get update && apt-get install -y \
    build-essential \
    libicu-dev \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    locales \
    zip \
    unzip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    git \
    curl \
    wget \
    zsh

RUN docker-php-ext-configure zip

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN docker-php-ext-install \
        bcmath \
        mbstring \
        pcntl \
        intl \
        zip \
        opcache

# apcu for caching, xdebug for debugging and also phpunit coverage
RUN pecl install \
        apcu-${APCU_VERSION} \
        xdebug \
    && docker-php-ext-enable \
        apcu \
        xdebug

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy existing app directory
WORKDIR /var/www
COPY . /var/www

# Copy and run composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
# For Laravel Installations
#RUN php artisan key:generate

EXPOSE 8080

CMD ["php-fpm"]