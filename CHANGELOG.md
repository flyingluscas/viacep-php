# Changelog

All Notable changes to `viacep-php` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## v2.0.0 - 2019-08-24

### Changed
- Class `ZipCode` renamed to `ViaCEP`.
- Method `findByCep` renamed to `findByZipCode`.
- Method `findByAddress` renamed to `findByStreetName`.

### Removed
- Method `find` (deprecated) removed.

## v1.1.0 - 2019-08-24

### Added
- Search addresses using city, state and street name (thanks to @matheuseduardo).

## v1.0.1 - 2017-09-23

### Fixed
- Error `403 Forbidden` when trying to search for addresses (implemented by **[@ferrl](https://github.com/ferrl)**).

## v1.0.0 - 2016-11-11

### Added
- Search addresses by zip code using the [ViaCEP](https://viacep.com.br) API.
