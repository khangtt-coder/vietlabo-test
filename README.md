# vietlabo test

## Folder question-1-2-3

How to run

1. docker-compose up
2. docker-compose exec app composer install

How to test

docker-compose exec app ./vendor/bin/phpunit tests/AnswerTest.php

## Folder question-4

Technology

Laravel 9 + Vuejs 3

How to run

1. cp .env.example .env
2. docker-compose up
3. docker-compose exec app composer install
4. docker-compose exec app php artisan migrate
5. docker-compose exec app php artisan db:seed
6. docker-compose exec app npm install
7. docker-compose exec app npm run build

API routes

I put APIs of the request on routes/api.php
