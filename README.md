## algorithms
Some algorithms in PHP and Golang.

### Setup
#### PHP
Executable file `./docker/bin/php` is based on image so run first:
`docker-compose -f docker-compose.php.yml build --no-cache php`

Then install dependencies:
`docker-compose -f docker-compose.php.yml run php php composer.phar install`

Run all tests:
`./docker/bin/php vendor/bin/phpunit --debug`

Or one:
`docker-compose -f docker-compose.php.yml run php vendor/bin/phpunit tests/FibonacciTest.php`

#### Go
Get env:
`./docker/bin/go env`

`docker-compose -f docker-compose.go.yml run go go env`

Run all tests:
`./docker/bin/go test tests/... -v`

Or One:
`./docker/bin/go test tests/Sorting`

## TODO
* Ford & Bellman algorithm (for negative weight)
