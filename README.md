## algorithms
Some algorithms in PHP and Golang.

### Setup
#### PHP
`docker-compose -f docker-compose.php.ymlbuild --no-cache php`

`docker-compose -f docker-compose.php.yml run php php composer.phar install`

`docker-compose -f docker-compose.php.yml run php vendor/bin/phpunit`

`docker-compose -f docker-compose.php.yml run php vendor/bin/phpunit src/Test/ExampleTest.php`

#### Go

`./docker/go/go test tests/Sorting`

`docker-compose -f docker-compose.go.yml run go go test ../../../tests/Sorting/buttle_sort_test.go`
