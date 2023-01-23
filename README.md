# Mongoose

[![SonarCloud](https://sonarcloud.io/images/project_badges/sonarcloud-white.svg)](https://sonarcloud.io/summary/new_code?id=nagyzekkyandras_mongoose)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=nagyzekkyandras_mongoose&metric=security_rating)](https://sonarcloud.io/summary/new_code?id=nagyzekkyandras_mongoose)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=nagyzekkyandras_mongoose&metric=code_smells)](https://sonarcloud.io/summary/new_code?id=nagyzekkyandras_mongoose)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=nagyzekkyandras_mongoose&metric=bugs)](https://sonarcloud.io/summary/new_code?id=nagyzekkyandras_mongoose)

**Stack:** PHP, Composer, Docker, MySQL, Liquibase, Maven, Robot Framework, SonarCloud

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

mysql
```sql
-- show everything in users table
SELECT * FROM users;

-- delete user by id
DELETE FROM users WHERE id = 3;

-- update last_login by id
UPDATE users SET last_login = '2022-10-10' WHERE id = 4;
```

robot-framework
```sh
# dependencies
pip3 install robotframework
pip3 install robotframework-seleniumlibrary
pip3 install webdrivermanager

# install chrome driver
sudo webdrivermanager chrome --linkpath /usr/local/bin
# output:
# Symlink created: /usr/local/bin/chromedriver

# to run tests
robot login.robot
robot test-db-errors.robot
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