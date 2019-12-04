# algorithms
Some algorithms in PHP.

## Setup
* `cp .env.dist .env`.
* Check `uid` and `gid`.

Executable file `./docker/bin/php` is based on image so run first:
`docker-compose build php`

Then install dependencies:
`docker-compose run php composer install`

Run all tests:
`./docker/bin/php vendor/bin/phpunit`

### Phpstorm
* PHPStorm -> Languages & Frameworks -> PHP 
  * Set PHP interpreter as `docker/bin/php`.

* PHPStorm -> Languages & Frameworks -> PHP -> Test Frameworks
  * User custom\Composer autoloader: `/path/to/vendor/autoload.php` 

## TODO
* Ford & Bellman algorithm (for negative weight)
* Levenshtein distance
