#!/bin/bash

composer install

if [ ! -f ".env" ]; then
    cp .env.example .env
    php artisan key:generate
fi

php artisan storage:link

composer require laravolt/avatar

npm install
