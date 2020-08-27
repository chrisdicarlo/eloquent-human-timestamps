<?php

namespace DiCarloSystems\TimestampHumanizer;

trait TimestampsForHumans
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

}