# datetime-strict
 
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-coveralls]][link-coveralls]
[![Total Downloads][ico-downloads]][link-downloads]
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Average time to resolve an issue](http://isitmaintained.com/badge/resolution/tomasfejfar/datetime-strict.svg)](http://isitmaintained.com/project/tomasfejfar/datetime-strict "Average time to resolve an issue")
[![Percentage of issues still open](http://isitmaintained.com/badge/open/tomasfejfar/datetime-strict.svg)](http://isitmaintained.com/project/tomasfejfar/datetime-strict "Percentage of issues still open")

Simple wrapper around DateTime to allow strict datetime validation

## Install via Composer

``` bash
composer require tomasfejfar/datetime-strict
```

## Usage

``` php
use TomasFejfar\DateTime\DateTimeStrict;
use TomasFejfar\DateTime\StrictFormatException;

try {
    $date = DateTimeStrict::createFromFormat('Y-m-d H:i:s', '2001-33-05 13:35:08');
} catch (StrictFormatException $e) {
    $warnings = $e->getWarnings();
    $errors = $e->getErrors();
}
```

Usage for immutable variant is the same, just use `DateTimeImmutableStrict::createFromFormat()` instead. 

## Changelog

Changes can be found in each tag's annotation

## Rules for contributing

- **1 PR per feature**
- PR with tests are more likely to be merged 
- **tests and coding standard must pass**

```bash
composer test
composer phpcs
```

**Happy coding**!

[ico-version]: https://img.shields.io/packagist/v/tomasfejfar/datetime-strict.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/tomasfejfar/datetime-strict/master.svg?style=flat-square
[ico-coveralls]: https://coveralls.io/repos/github/tomasfejfar/datetime-strict/badge.svg?branch=master
[ico-downloads]: https://img.shields.io/packagist/dt/tomasfejfar/datetime-strict.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/tomasfejfar/datetime-strict
[link-travis]: https://travis-ci.org/tomasfejfar/datetime-strict
[link-coveralls]: https://coveralls.io/github/tomasfejfar/datetime-strict?branch=master
[link-downloads]: https://packagist.org/packages/tomasfejfar/datetime-strict
