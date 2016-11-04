# ViaCEP PHP SDK

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-code-climate]][link-code-climate]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

PHP library for consulting zip codes using the [ViaCEP](https://viacep.com.br) API. 

## Install

Via Composer

``` bash
$ composer require flyingluscas/viacep-php
```

## Usage

``` php
$skeleton = new FlyingLuscas\ViaCEP();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email lucas.pires.mattos@gmail.com instead of using the issue tracker.

## Credits

- [Lucas Pires][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/flyingluscas/viacep-php.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/flyingluscas/viacep-php/master.svg?style=flat-square
[ico-code-climate]: https://img.shields.io/codeclimate/coverage/github/flyingluscas/viacep-php.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/codeclimate/github/flyingluscas/viacep-php.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/flyingluscas/viacep-php.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/flyingluscas/viacep-php
[link-travis]: https://travis-ci.org/flyingluscas/viacep-php
[link-code-climate]: https://codeclimate.com/github/flyingluscas/viacep-php/coverage
[link-code-quality]: https://codeclimate.com/github/flyingluscas/viacep-php/code
[link-downloads]: https://packagist.org/packages/flyingluscas/viacep-php
[link-author]: https://github.com/flyingluscas
[link-contributors]: ../../contributors
