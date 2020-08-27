# Timestamp Humanizer for Laravel

This package provides a trait you can add to an Eloquent model that will automatically create human-readable timestamp diffs using Carbon.

## Installation

To install the package run:

```
composer require dicarlosystems/timestamp-humanizer
```

## Setup

Add the DiCarloSystems\TimestampHumanizer\TimestampsForHumans trait to a model that has timestamp columns, e.g.:

```

use DiCarloSystems\TimestampHumanizer\TimestampsForHumans;

class Foobar
{
  
    use TimestampsForHumans;

   ...

}
```

## Usage

To get the human-readable attribute, simply retrieve the timestamp normally but append **_for_humans** to the name, e.g. created_at_for_humans, updated_at_for_humans.

