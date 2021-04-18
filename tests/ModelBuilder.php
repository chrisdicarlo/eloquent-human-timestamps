<?php

namespace ChrisDiCarlo\EloquentHumanTimestamps\Test;

use Illuminate\Support\Stringable;

class ModelBuilder {
    private bool $useTrait;
    private bool $useSoftDeletes;
    private bool $useCastsProperty;
    private bool $useDatesProperty;
    private string $castType;

    public function __construct() {
        $this->useTrait = false;
        $this->useSoftDeletes = false;
        $this->useCastsProperty = false;
        $this->useDatesProperty = false;
        $this->castType = '';
    }

    public function build()
    {
        $classDef = <<<EOT
            return new class() extends Illuminate\Database\Eloquent\Model
            {
                {$this->buildClassDef()}
            };
            EOT;

        return eval($classDef);
    }

    private function buildClassDef()
    {
        $def = '';

        if($this->useTrait) {
            $def .= 'use ChrisDiCarlo\EloquentHumanTimestamps\HumanTimestamps;';
        }

        if($this->useSoftDeletes) {
            $def .= 'use Illuminate\Database\Eloquent\SoftDeletes;';
        }

        if($this->useCastsProperty) {
            $def .= "protected \$casts = ['published_at' => '{$this->castType}'];";
        }

        if($this->useDatesProperty) {
            $def .= 'protected $dates = [\'published_at\'];';
        }

        return $def;
    }

    public function withTrait()
    {
        $this->useTrait = true;
        return $this;
    }

    public function withSoftDeletes()
    {
        $this->useSoftDeletes = true;
        return $this;
    }

    public function withCastsProperty(string $castType = 'datetime')
    {
        $this->castType = $castType;
        $this->useCastsProperty = true;
        return $this;
    }

    public function withDatesProperty()
    {
        $this->useDatesProperty = true;
        return $this;
    }
}
