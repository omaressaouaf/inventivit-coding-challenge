#!/bin/bash

echo "Running composer install..."
composer install
echo "Composer install completed."

echo "Running php artisan key:generate..."
php artisan key:generate
echo "php artisan key:generate completed."

echo "Running php artisan migrate"
php artisan migrate
echo "php artisan migrate"

echo "Running npm install..."
npm install
echo "npm install completed."

echo "Running npm run build..."
npm run build
echo "npm run build completed."

echo "Setup script executed successfully. you can launch the app with php artisan serve or any local setup of your choice"
