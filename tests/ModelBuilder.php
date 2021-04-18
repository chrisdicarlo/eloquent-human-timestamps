<?php

namespace ChrisDiCarlo\EloquentHumanTimestamps\Test;

class ModelBuilder {
    private bool $includeTrait;
    private bool $includeCastsProperty;
    private bool $includeDatesProperty;

    public function __construct(bool $includeTrait = true, bool $includeCastsProperty = true, bool $includeDatesProperty = false) {
        $this->includeTrait = $includeTrait;
        $this->includeCastsProperty = $includeCastsProperty;
        $this->includeDatesProperty = $includeDatesProperty;
    }

    public function build()
    {
        $classDef = <<<EOT
            return new class() extends Illuminate\Database\Eloquent\Model
            {
                {$this->withTrait()}
                {$this->withCastsProperty()}
                {$this->withDatesProperty()}
            };
            EOT;

        return eval($classDef);
    }

    private function withTrait()
    {
        return ($this->includeTrait ? 'use ChrisDiCarlo\EloquentHumanTimestamps\HumanTimestamps;' : '');
    }

    private function withCastsProperty()
    {
        return ($this->includeCastsProperty ? 'protected $casts = [\'published_at\' => \'datetime\'];' : '');
    }

    private function withDatesProperty()
    {
        return ($this->includeDatesProperty ? 'protected $dates = [\'published_at\'];' : '');
    }
}
