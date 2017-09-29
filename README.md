## algorithms
Some algorithms in PHP and Golang.

### Setup
#### PHP
`docker-compose -f docker-compose.php.ymlbuild --no-cache php`

`docker-compose -f docker-compose.php.yml run php php composer.phar install`

`docker-compose -f docker-compose.php.yml run php vendor/bin/phpunit`

`docker-compose -f docker-compose.php.yml run php vendor/bin/phpunit src/Test/ExampleTest.php`

#### Go
