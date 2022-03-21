# News subscription api

### Docker startup

- `docker-compose up -d`
- `docker-compose exec app cp .env.example_docker .env`
- `docker-compose exec app composer install`
- `docker-compose exec app php artisan key:generate`
- `docker-compose exec app php artisan migrate`
- `docker-compose exec app php artisan queue:work`

### if no docker then just install php7.4 and composer and run

- `cp .env.example_docker .env`
- `composer install`
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan queue:work`

## mailing is setup with my test account, should work out of the box
