FROM php:8.2-fpm

# Installation des dépendances
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configuration de l'environnement de travail
WORKDIR /var/www/html
COPY . .
RUN composer install --no-dev --optimize-autoloader

CMD ["php-fpm"]
