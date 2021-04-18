<?php

namespace ChrisDiCarlo\EloquentHumanTimestamps\Test;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        // Note: this also flushes the cache from within the migration
        $this->setUpDatabase($this->app);
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    /**
     * Set up the database.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function setUpDatabase($app)
    {
        include_once __DIR__.'/../database/migrations/create_test_models_table.php.stub';

        (new \CreateTestModelsTable())->up();
    }

    protected function createClass(bool $withTrait = true, bool $withCast = true, bool $withDate = false) {
        $builder = new ModelBuilder();
        $classDef = <<<EOT
            return new class() extends Illuminate\Database\Eloquent\Model
            {
                {$builder->withTrait($withTrait)}
                {$builder->withCastsProperty($withCast)}
                {$builder->withDatesProperty($withDate)}
            };
            EOT;

        return eval($classDef);
    }
}
