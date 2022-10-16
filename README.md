# vietlabo test

## Folder question-1-2-3

How to run

1. docker-compose up
2. docker-compose exec app composer install

How to test

./vendor/bin/phpunit tests/AnswerTest.php

## Folder question-4

How to run

1. docker-compose up
2. docker-compose exec app composer install
3. docker-compose exec app php artisan migrate
4. docker-compose exec app php artisan db:seed

API routes

I put APIs of the request on routes/api.php
