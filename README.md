# Automatic human timestamp properties in Laravel

This package provides a trait you can add to an Eloquent model that will automatically create human-readable timestamp diffs using Carbon.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chrisdicarlo/eloquent-human-timestamps.svg?style=flat-square)](https://packagist.org/packages/chrisdicarlo/eloquent-human-timestamps)
![Laravel 8 Tests](https://github.com/chrisdicarlo/eloquent-human-timestamps/actions/workflows/run-tests-L8.yml/badge.svg)
![Laravel 6 & 7 Tests](https://github.com/chrisdicarlo/eloquent-human-timestamps/actions/workflows/run-tests-L7.yml/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/chrisdicarlo/eloquent-human-timestamps.svg?style=flat-square)](https://packagist.org/packages/chrisdicarlo/eloquent-human-timestamps)

## Version Compatibility

| Laravel | PHP | Package Version |
| ------- | --- | --------------- |
| 6.x | 8.0, 7.4, 7.3 | v2.x |
| 7.x | 8.0, 7.4, 7.3 | v2.x |
| 8.x | 8.1, 8.0, 7.4, 7.3 | v3.x |

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
