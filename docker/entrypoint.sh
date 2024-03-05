#!/bin/bash

php artisan migrate:fresh --seed
php artisan cache:clear
php artisan config:clear
php artisan serve --port=$PORT --host=0.0.0.0 


exec docker-ext-entrypoint "$@"