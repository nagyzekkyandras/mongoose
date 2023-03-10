# Mongoose

[![SonarCloud](https://sonarcloud.io/images/project_badges/sonarcloud-white.svg)](https://sonarcloud.io/summary/new_code?id=nagyzekkyandras_mongoose)

[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=nagyzekkyandras_mongoose&metric=security_rating)](https://sonarcloud.io/summary/new_code?id=nagyzekkyandras_mongoose)
[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=nagyzekkyandras_mongoose&metric=reliability_rating)](https://sonarcloud.io/summary/new_code?id=nagyzekkyandras_mongoose)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=nagyzekkyandras_mongoose&metric=vulnerabilities)](https://sonarcloud.io/summary/new_code?id=nagyzekkyandras_mongoose)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=nagyzekkyandras_mongoose&metric=code_smells)](https://sonarcloud.io/summary/new_code?id=nagyzekkyandras_mongoose)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=nagyzekkyandras_mongoose&metric=bugs)](https://sonarcloud.io/summary/new_code?id=nagyzekkyandras_mongoose)
[![Lines of Code](https://sonarcloud.io/api/project_badges/measure?project=nagyzekkyandras_mongoose&metric=ncloc)](https://sonarcloud.io/summary/new_code?id=nagyzekkyandras_mongoose)

[![GitHub Repo stars](https://img.shields.io/github/stars/nagyzekkyandras/mongoose)](https://github.com/nagyzekkyandras/mongoose/stargazers)

**Stack:** PHP, Composer, Docker, MySQL, Liquibase, Maven, Robot Framework, SonarCloud, Nexus, Github Actions

### Commands
docker / php app
```sh
# "prod" build
docker build -f prod.Dockerfile -t mongoose:prod .
docker run -d -p 80:80 --env-file ./.env mongoose:prod

# "dev" build
docker build -f dev.Dockerfile -t mongoose:dev .
docker run -d -p 80:80 -v "$PWD/app":/var/www/html --env-file ./.env --name app mongoose:dev

# to test open: http://localhost/index.php
```
docker / mysql
```sh
# mysql
docker run -d -p 3306:3306 -e MYSQL_ROOT_PASSWORD=example -e MYSQL_DATABASE=mongoose -e TZ=Europe/Budapest --name mysql mysql:8
# (Use root/example as user/password credentials)
```
docker / nexus
```sh
# nexus (--platform becouse there are no arm64)
docker run -d -p 8081:8081 --name nexus sonatype/nexus3:3.45.0

# see the logs
docker logs -f nexus 

# get the admin password
docker exec -it nexus cat /nexus-data/admin.password
```

composer
```sh
# to add a package (it creates the base composer.json and composer.lock if not exsists)
composer require google/apiclient:"^2.0"

# to install the packages defined in the composer files
composer install

# update dependencies
composer update

# autoload file check and regenerate
composer dump-autoload
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

# to install the specific change sets by filter
liquibase update --labelFilter="test"

# to change the changelog file only
liquibase update --changelog-file=changelog.test.sql
```

mysql
```sql
-- show everything in users table
SELECT * FROM users;

-- delete user by id
DELETE FROM users WHERE id = 3;

-- update last_login by id
UPDATE users SET last_login = '2022-10-10' WHERE id = 4;

-- count query
select count(id) as count from users where email='admin@admin.hu';

-- insert
INSERT INTO gitlab (name, url) VALUES ('gitlab-dev', 'https://gitlab-dev.cegem.hu');

-- check the active connections
show status where `variable_name` = 'Threads_connected';
-- or
show processlist;
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

nexus3 cli
```sh
# install
pip3 install nexus3-cli

# login
nexus3 login

# create docker repository
nexus3 repository create hosted docker mongoose
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
| DB_DRIVER | Database connection driver.|
| GC_CLIENT_ID | Google Cloud Client ID.|
| GC_CLIENT_SECRET | Google Cloud Secret.|
| GC_CLIENT_URI | Google Cloud auth URI.|