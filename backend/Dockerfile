FROM php:8.3-cli

# System deps
RUN apt-get update && apt-get install -y     git unzip libicu-dev libzip-dev libonig-dev libxml2-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev     && docker-php-ext-configure intl     && docker-php-ext-install pdo_mysql intl zip bcmath gd     && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
