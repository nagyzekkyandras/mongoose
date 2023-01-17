# Learning PHP

### Parancsok
docker
```sh
# "prod" build
docker build -f prod.Dockerfile -t learning-php:prod .
docker run -d -p 80:80 --env-file ./.env learning-php:prod

# "dev" build
docker build -f dev.Dockerfile -t learning-php:dev .
docker run -d -p 80:80 -v "$PWD/app":/var/www/html --env-file ./.env learning-php:dev

# to test open: http://localhost/index.php
```
composer
```sh
# to add an package (it creates the base composer.json and composer.lock)
composer require google/apiclient:"^2.0"

# to install the packages defined in the composer files
composer install
```