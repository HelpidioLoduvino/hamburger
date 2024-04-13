FROM php:latest


WORKDIR /var/www/html


RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip pdo pdo_mysql


COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8000
