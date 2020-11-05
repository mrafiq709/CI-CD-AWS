#!/bin/bash
#Auto run after deploy source code
composer install && \
composer dumpautoload && \
sudo chmod -R 777 storage bootstrap/cache && \
php artisan cache:clear && \
php artisan config:clear && \
php artisan route:clear && \
php artisan view:clear
