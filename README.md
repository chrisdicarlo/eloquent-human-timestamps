# Automatic human timestamp properties in Laravel

This package provides a trait you can add to an Eloquent model that will automatically create human-readable timestamp diffs using Carbon.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chrisdicarlo/eloquent-human-timestamps.svg?style=flat-square)](https://packagist.org/packages/chrisdicarlo/eloquent-human-timestamps)
![Laravel 7/8 Tests](https://github.com/chrisdicarlo/eloquent-human-timestamps/actions/workflows/run-tests-L7.yml/badge.svg)
![Laravel 9 Tests](https://github.com/chrisdicarlo/eloquent-human-timestamps/actions/workflows/run-tests-L9.yml/badge.svg)
![Laravel 10 Tests](https://github.com/chrisdicarlo/eloquent-human-timestamps/actions/workflows/run-tests-L10.yml/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/chrisdicarlo/eloquent-human-timestamps.svg?style=flat-square)](https://packagist.org/packages/chrisdicarlo/eloquent-human-timestamps)

## Version Compatibility

| Laravel | PHP | Package Version |
| ------- | --- | --------------- |
| 6 | 8.0, 7.4, 7.3 | 2 |
| 7 | 8.0, 7.4, 7.3 | 2 |
| 8 | 8.1, 8.0, 7.4, 7.3 | 3 |
| 9 | 8.1, 8.0 | 4 |
| 10 | 8.1 | 5 |

## Installation

To install the package run:

```
composer require chrisdicarlo/eloquent-human-timestamps
```

## Setup

Add the ChrisDiCarlo\EloquentHumanTimestamps\HumanTimestamps trait to a model that has timestamp columns, e.g.:

```

use ChrisDiCarlo\EloquentHumanTimestamps\HumanTimestamps;

class Foobar
{

    use HumanTimestamps;

   ...

}
```

## Usage

To get the human-readable attribute, simply retrieve the timestamp normally but append **_for_humans** to the name, e.g. created_at_for_humans, updated_at_for_humans.
