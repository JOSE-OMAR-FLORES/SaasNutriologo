FROM php:8.2-fpm

# Instalar dependencias del sistema necesarias para Laravel + PostgreSQL
RUN apt-get update && apt-get install -y \
    nginx \
    unzip \
    git \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql zip mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Crear directorio del proyecto
WORKDIR /var/www

# Copiar los archivos del proyecto
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Dar permisos adecuados a Laravel
RUN chown -R www-data:www-data /var/www && \
    chmod -R 755 /var/www/storage

# Variables de entorno para producción
ENV APP_ENV=production
ENV APP_DEBUG=false

# Exponer el puerto (Render usa este puerto)
EXPOSE 10000

# Comando por defecto (aunque puedes usar startCommand en Render)
CMD php artisan serve --host=0.0.0.0 --port=${PORT}
