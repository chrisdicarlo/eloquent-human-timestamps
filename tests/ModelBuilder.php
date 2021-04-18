<?php

namespace ChrisDiCarlo\EloquentHumanTimestamps\Test;

class ModelBuilder {
    public function withTrait(bool $withTrait)
    {
        return ($withTrait ? 'use ChrisDiCarlo\EloquentHumanTimestamps\HumanTimestamps;' : '');
    }

    public function withCastsProperty(bool $withCast)
    {
        return ($withCast ? 'protected $casts = [\'published_at\' => \'datetime\'];' : '');
    }

    public function withDatesProperty(bool $withDate)
    {
        return ($withDate ? 'protected $dates = [\'published_at\'];' : '');
    }
}
