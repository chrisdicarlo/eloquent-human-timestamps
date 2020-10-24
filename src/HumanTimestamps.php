<?php

namespace ChrisDiCarlo\EloquentHumanTimestamps;

use Illuminate\Support\Str;

trait HumanTimestamps
{
    public function getCreatedAtForHumansAttribute()
    {
        if ($this->{$this->getCreatedAtColumn()}) {
            return $this->{$this->getCreatedAtColumn()}->diffForHumans();
        }

        return null;
    }

    public function getUpdatedAtForHumansAttribute()
    {
        if ($this->{$this->getUpdatedAtColumn()}) {
            return $this->{$this->getUpdatedAtColumn()}->diffForHumans();
        }

        return null;
    }

    public function __get($key)
    {
        // If the attribute does not end in the correct suffix, delegate to the
        // default method on the parent.  The date check is required to make
        // sure the attribute is properly casted to a Carbon instance
        if(Str::endsWith($key, '_for_humans') && $this->getAttribute(Str::beforeLast($key, '_for_humans')) && $this->isDateAttribute(Str::beforeLast($key, '_for_humans'))) {
            return $this->getAttribute(Str::beforeLast($key, '_for_humans'))->diffForHumans();
        }

        return parent::__get($key);
    }

}
