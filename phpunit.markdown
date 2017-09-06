# PHPUnit

## Install or update

[oficial steps php installation](https://phpunit.de/manual/current/en/installation.html)

## Install composer

[oficial steps composer installation](https://getcomposer.org/download/)

## Work locally

**Need composer**

 `$ composer require --dev phpunit/phpunit ^6.2`

### Add coverage

**coverage requires xdebug**

```
# For PHP 5, PHP 7

$ sudo apt-get install php5-xdebug
$ sudo apt install php-xdebug
```

* Add phpunit.xml

[example](https://phpunit.de/manual/current/en/appendixes.configuration.html)

* Execute coverage

`$ phpunit --coverage-html coverage`

* view how to use PHP INI settings, Constants and Global Variables

### Create Mocks

**Requires mockery**

`$ composer require --dev mockery/mockery`

**needs require autoload.php for avoid dependenci problems**
