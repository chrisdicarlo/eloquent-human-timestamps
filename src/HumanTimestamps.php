<?php

namespace ChrisDiCarlo\EloquentHumanTimestamps;

use Illuminate\Support\Str;

trait HumanTimestamps
{
    public function __get($key)
    {
        if(Str::endsWith($key, '_for_humans') &&
            $this->getAttribute(Str::before($key, '_for_humans')) &&
            $this->isDateAttribute(Str::before($key, '_for_humans'))) {
                return $this->getAttribute(Str::before($key, '_for_humans'))->diffForHumans();
            }

        return parent::__get($key);
    }

}
