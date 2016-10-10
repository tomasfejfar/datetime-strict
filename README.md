# datetime-strict
 
[![Build Status][ico-travis]][link-travis]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Total Downloads][ico-downloads]][link-downloads]
[![Latest Version on Packagist][ico-version]][link-packagist]

Simple wrapper around DateTime to allow strict datetime validation

## Install via Composer

``` bash
composer require tomasfejfar/datetime-strict
```

## Usage

``` php
use DateTimeStrict\DateTime;
try {
    $date = DateTime::createFromFormatStrict('Y-m-d H:i:s', '2001-33-05 13:35:08');
} catch (StrictFormatException $e) {
    $warnings = $e->getWarnings();
}
```

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
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/tomasfejfar/datetime-strict.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/tomasfejfar/datetime-strict.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/tomasfejfar/datetime-strict.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/tomasfejfar/datetime-strict
[link-travis]: https://travis-ci.org/tomasfejfar/datetime-strict
[link-scrutinizer]: https://scrutinizer-ci.com/g/tomasfejfar/datetime-strict/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/tomasfejfar/datetime-strict
[link-downloads]: https://packagist.org/packages/tomasfejfar/datetime-strict
