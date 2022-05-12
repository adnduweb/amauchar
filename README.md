# Amauchar

Just getting started. 

## Server Requirements

This currently has the same requirements as CodeIgniter 4.

## Installation

Installation is a simple 2-step process:

```php
> composer create-project adnduweb/amauchar app --stability dev
> cd app
> php spark adn:install
```

Find more details in the [docs folder](_docs).

## Third Party Software Used

- [Bootstrap 5](https://getbootstrap.com/) for the CSS foundation
- [FontAwesome 5](https://fontawesome.com/) icons used in the admin 
- [Metronic](https://keenthemes.com/metronic/) Theme home et back.
- [htmx](https://htmx.org/) provides AJAX form handling, and more.
- [Codeigniter4/shield](https://github.com/codeigniter4/shield) CodeIgniter library for simple Acces (orm). 


## Install

- php spark adn:install   

## DEV 

- npm run watch --front
- npm run watch --front
- npm run production --admin --dark_mode

## Test apps
php -d memory_limit=-1 vendor/bin/phpunit --path-coverage tests/system/Database/BaseQueryTest.php --coverage-html build/coverage