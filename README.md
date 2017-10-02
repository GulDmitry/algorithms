## algorithms
Some algorithms in PHP and Golang.

### Setup
#### PHP
`docker-compose -f docker-compose.php.yml build --no-cache php`

`docker-compose -f docker-compose.php.yml run php php composer.phar install`

`./docker/bin/php vendor/bin/phpunit`

`docker-compose -f docker-compose.php.yml run php vendor/bin/phpunit src/Test/ExampleTest.php`

#### Go

`./docker/bin/go test tests/Sorting`

`docker-compose -f docker-compose.go.yml run go go test ../../../tests/Sorting/buttle_sort_test.go`
