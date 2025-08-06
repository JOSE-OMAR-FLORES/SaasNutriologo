#!/bin/bash

# Ejecutar migraciones
php artisan migrate --force

# Limpiar cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimizar autoloader de Composer
composer install --optimize-autoloader --no-dev
