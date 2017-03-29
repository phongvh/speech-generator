# Speech Generator for Laravel

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This package provides you with a simple text-to-speech tool and convert your text to audio files.

## Install

Via Composer

``` bash
$ composer require phongvh/speech-generator
```

Add the ServiceProvider to the providers array in app/config/app.php

```php
Phongvh\SpeechGen\SpeechGenServiceProvider::class
```

Add the routes to route/web.php
```php
\Phongvh\SpeechGen\SpeechGen::routes();
```

## Usage

Go to /speech to use the generator

<!---
## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email phongvh50ca@gmail.com instead of using the issue tracker.

## Credits

- [Phong Vu][link-author]
- [All Contributors][link-contributors]
--->
## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/phongvh/speech-generator.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/phongvh/speech-generator/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/phongvh/speech-generator.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/phongvh/speech-generator.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/phongvh/speech-generator.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/phongvh/speech-generator
[link-travis]: https://travis-ci.org/phongvh/speech-generator
[link-scrutinizer]: https://scrutinizer-ci.com/g/phongvh/speech-generator/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/phongvh/speech-generator
[link-downloads]: https://packagist.org/packages/phongvh/speech-generator
[link-author]: https://github.com/phongvh
[link-contributors]: ../../contributors
