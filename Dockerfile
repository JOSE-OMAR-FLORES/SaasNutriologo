# Etapa 1: build frontend + composer
FROM node:20 as frontend

WORKDIR /app

COPY package*.json vite.config.* tailwind.config.* postcss.config.* ./
RUN npm install

COPY resources ./resources
COPY public ./public
RUN npm run build

# Etapa 2: Composer y app
FROM composer:2 as build

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

# Etapa 3: producción con PHP + NGINX
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    nginx \
    unzip \
    git \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql zip mbstring exif pcntl bcmath gd

# Copiar archivos del frontend compilado
COPY --from=frontend /app/public /var/www/public
# Copiar app PHP y vendor
COPY --from=build /app /var/www

COPY docker/nginx.conf /etc/nginx/nginx.conf

# Configuración permisos
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www/storage

WORKDIR /var/www

EXPOSE 80

CMD service nginx start && php-fpm
