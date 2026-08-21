FROM php:8.4-cli

WORKDIR /app

# Install system deps and build/install the PHP zip extension and pdo_mysql
RUN apt-get update && apt-get install -y \
        unzip \
        zip \
        git \
        libzip-dev \
        zlib1g-dev \
    && docker-php-ext-configure zip  \
    && docker-php-ext-install zip pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN php artisan storage:link || true

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]