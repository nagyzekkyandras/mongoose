# Learning PHP

### Parancsok
docker
```sh
# "prod" build
docker build -f prod.Dockerfile -t mongoose:prod .
docker run -d -p 80:80 --env-file ./.env mongoose:prod

# "dev" build
docker build -f dev.Dockerfile -t mongoose:dev .
docker run -d -p 80:80 -v "$PWD/app":/var/www/html --env-file ./.env mongoose:dev

# to test open: http://localhost/index.php
```
composer
```sh
# to add an package (it creates the base composer.json and composer.lock)
composer require google/apiclient:"^2.0"

# to install the packages defined in the composer files
composer install

# update dependencies
composer update
```

mysql
```sh
docker run -d -p 3306:3306 --name learning-mysql -e MYSQL_ROOT_PASSWORD=example mysql:8
# (Use root/example as user/password credentials)
```