# Qchan
[Qchan website](https://qchan.haakon.wtf/)

Production:
[![pipeline status](https://gitlab.com/haakon36/Qchan/badges/production/pipeline.svg)](https://gitlab.com/haakon36/Qchan/-/commits/production)

### About

Qchan - A social-media app made in Laravel. Postgres for DB. Users can make posts (CRUD), reply to them, upvote and downvote, follow other users, dynamic profiles with custom avatars- and backgrounds, Using S3 AWS for storage  in production.

### How to run

* Using Docker (recommended): \
  Requires: Docker and docker-compose \
How: 
  1. use `cp .env.production .env` to copy the env file.
  2. type `docker-compose up -d` to create and run the containers
  3. type `docker exec qchan_api_1 php artisan key:generate` to generate a key for Laravel
  4. finally `docker exec qchan_api_1 php artisan migrate` to create a db migration
  5. go to `localhost:8000` in your browser to use the app.
     * optional: create symlinks `php artisan storage:link` if you want to use storage
    

* Run normally in CLI: \
  Requires: PHP:^7.3 , Composer, Postgres
  1. use `cp .env.example .env` to copy the env file, fill in your db credentials.
  2. use `composer install` to install dependencies for the app.
  3. type `php artisan key:generate` to generate a key for Laravel
  4. Migrate the schemas: `php artisan migrate`
  5. Finally use `php artisan serve` to use a local webserver with PHP to host the app.
  6. Go to `localhost:8000` in your browser to use the app.
    * optional: create symlinks `php artisan storage:link` if you want to use storage
