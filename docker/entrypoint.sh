#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
    echo "Creating env file for env $APP_ENV"
    cp .env.example .env
else
    echo "env file exists."
fi

npm install
npm run prod

role=${CONTAINER_ROLE:-app}

if [ "$role" = "app" ]; then
    php artisan key:generate
    php artisan cache:clear;
    php artisan config:clear
    php artisan config:cache
    php artisan route:clear
    php artisan view:cache
    php artisan migrate
    php artisan db:seed
    php artisan test
    php artisan l5-swagger:generate
    php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
    exec docker-php-entrypoint "$@"
fi