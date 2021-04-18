<?php

namespace ChrisDiCarlo\EloquentHumanTimestamps\Test;

use Illuminate\Database\Eloquent\Model;
use ChrisDiCarlo\EloquentHumanTimestamps\Test\TestCase;
use ChrisDiCarlo\EloquentHumanTimestamps\Test\ModelBuilder;

class HasHumanTimestampsTest extends TestCase
{
    /** @test */
    public function it_returns_null_if_the_model_does_not_have_the_trait()
    {
        $model = $this->createClass(false);
        $this->assertNull($model->published_at_for_humans);
    }

    /** @test */
    public function it_returns_a_human_timestamp_if_the_model_has_the_trait()
    {
        $this->travel(-5)->days();

        $published_at = now();
        $model = $this->createClass();
        $model->published_at = $published_at;

        $this->travelBack();

        $this->assertEquals('5 days ago', $model->published_at_for_humans);
    }

    /** @test */
    public function it_returns_a_human_timestamp_if_the_requested_attribute_is_contained_in_the_dates_array()
    {
        $this->travel(-5)->days();

        $published_at = now();
        $model = $this->createClass(true, false, true);
        $model->published_at = $published_at;

        $this->travelBack();

        $this->assertNotNull($model->published_at_for_humans);
        $this->assertEquals('5 days ago', $model->published_at_for_humans);
    }

    /** @test */
    public function it_returns_a_human_timestamp_if_the_requested_attribute_is_contained_in_the_casts_array()
    {
        $this->travel(-5)->days();

        $published_at = now();
        $model = $this->createClass(true, true, false);
        $model->published_at = $published_at;

        $this->travelBack();

        $this->assertNotNull($model->published_at_for_humans);
        $this->assertEquals('5 days ago', $model->published_at_for_humans);
    }

    /** @test */
    public function it_returns_a_human_timestamp_if_the_requested_attribute_is_contained_in_the_casts_array_and_the_dates_array()
    {
        $this->travel(-5)->days();

        $published_at = now();
        $model = $this->createClass(true, true, true);
        $model->published_at = $published_at;

        $this->travelBack();

        $this->assertNotNull($model->published_at_for_humans);
        $this->assertEquals('5 days ago', $model->published_at_for_humans);
    }

    /** @test */
    public function it_returns_null_if_the_requested_attribute_is_not_contained_in_the_casts_array_or_the_dates_array()
    {
        $this->travel(-5)->days();
        $published_at = now();
        $model = $this->createClass(true, false, false);
        $model->published_at = $published_at;

        $this->travelBack();
        $this->assertNull($model->published_at_for_humans);
    }
}
