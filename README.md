# Mongoose
Stack: PHP, Composer, Docker, Liquibase, Maven

### Commands
docker
```sh
# "prod" build
docker build -f prod.Dockerfile -t mongoose:prod .
docker run -d -p 80:80 --env-file ./.env mongoose:prod

# "dev" build
docker build -f dev.Dockerfile -t mongoose:dev .
docker run -d -p 80:80 -v "$PWD/app":/var/www/html --env-file ./.env mongoose:dev

# to test open: http://localhost/index.php

# mysql
docker run -d -p 3306:3306 -e MYSQL_ROOT_PASSWORD=example -e MYSQL_DATABASE=mongoose -e TZ=Europe/Budapest mysql:8
# (Use root/example as user/password credentials)
```

composer
```sh
# to add a package (it creates the base composer.json and composer.lock if not exsists)
composer require google/apiclient:"^2.0"

# to install the packages defined in the composer files
composer install

# update dependencies
composer update
```

mvn
```sh
# to get the mysql jar file
cd database
mvn dependency:copy-dependencies
```

liquibase
```sh
# to run everything
liquibase update

# to install the base tables
liquibase update --labelFilter="base"

# to add test data
liquibase update --labelFilter="test"
```

### Environment variables
Example file: env.example
| Name | Description|
|---|---|
| DB_HOST | Database hostname or IP address.|
| DB_PORT | Database port.|
| DB_NAME | Database name.|
| DB_USERNAME | Database connection username.|
| DB_PASSWORD | Database connection password.|
| GC_CLIENT_ID | Google Cloud Client ID.|
| GC_CLIENT_SECRET | Google Cloud Secret.|
| GC_CLIENT_URI | Google Cloud auth URI.|