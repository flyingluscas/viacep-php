# ViaCEP PHP SDK

[![Latest Version on Packagist][ico-version]][link-packagist]
[![CircleCI][icon-circleci]][link-circleci]
[![Codecov][icon-codecov]][link-codecov]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

Search for addresses by zip code using the [ViaCEP](https://viacep.com.br) REST API.

## Install

Via Composer

``` bash
$ composer require flyingluscas/viacep-php
```

## Usage

``` php
use FlyingLuscas\ViaCEP\ZipCode;

$zipcode = new ZipCode;

```

### Array

``` php
$address = $zipcode->findByCep('01001-000')->toArray();

/*
The returned result would be something like this:

[
    'zipCode' => '01001-000',
    'street' => 'Praça da Sé',
    'complement' => 'lado ímpar',
    'neighborhood' => 'Sé',
    'city' => 'São Paulo',
    'state' => 'SP',
    'ibge' => '3550308',
]
*/
```

### JSON

``` php
$address = $zipcode->findByCep('01001-000')->toJson();

/*
The returned result would be something like this:

{
    "zipCode": "01001-000",
    "street": "Praça da Sé",
    "complement": "lado ímpar",
    "neighborhood": "Sé",
    "city": "São Paulo",
    "state": "SP",
    "ibge": "3550308"
}
*/
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
[ico-downloads]: https://img.shields.io/packagist/dt/flyingluscas/viacep-php.svg?style=flat-square
[icon-circleci]: https://img.shields.io/circleci/project/github/flyingluscas/viacep-php.svg?style=flat-square
[icon-codecov]: https://img.shields.io/codecov/c/github/flyingluscas/viacep-php.svg?style=flat-square

[link-circleci]: https://circleci.com/gh/flyingluscas/viacep-php
[link-codecov]: https://codecov.io/gh/flyingluscas/viacep-php
[link-packagist]: https://packagist.org/packages/flyingluscas/viacep-php
[link-downloads]: https://packagist.org/packages/flyingluscas/viacep-php
[link-author]: https://github.com/flyingluscas
[link-contributors]: ../../contributors
