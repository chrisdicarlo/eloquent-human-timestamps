<?php

namespace ChrisDiCarlo\EloquentHumanTimestamps\Test;

use ChrisDiCarlo\EloquentHumanTimestamps\Test\TestCase;
use ChrisDiCarlo\EloquentHumanTimestamps\Test\ModelBuilder;

class HasHumanTimestampsTest extends TestCase
{
    /** @test */
    public function it_returns_null_if_the_model_does_not_have_the_trait()
    {
        $model = (new ModelBuilder)->build();
        $model->published_at = now();
        $this->assertNull($model->published_at_for_humans);
    }

    /** @test */
    public function it_returns_a_human_timestamp_if_the_requested_attribute_is_contained_in_the_casts_array_and_casted_to_datetime()
    {
        $published_at = now()->subDays(5);
        $model = (new ModelBuilder)->withTrait()->withCastsProperty('datetime')->build();
        $model->published_at = $published_at;

        $this->assertNotNull($model->published_at_for_humans);
        $this->assertEquals('5 days ago', $model->published_at_for_humans);
    }

    /** @test */
    public function it_returns_a_human_timestamp_if_the_requested_attribute_is_contained_in_the_casts_array_and_casted_to_date()
    {
        $published_at = now()->subDays(5);
        $model = (new ModelBuilder)->withTrait()->withCastsProperty('date')->build();
        $model->published_at = $published_at;

        $this->assertNotNull($model->published_at_for_humans);
        $this->assertEquals('5 days ago', $model->published_at_for_humans);
    }

    /** @test */
    public function it_returns_a_human_timestamp_if_the_requested_attribute_is_contained_in_the_casts_array_casted_to_datetime_and_the_dates_array()
    {
        $published_at = now()->subDays(5);
        $model = (new ModelBuilder)->withTrait()->withCastsProperty('datetime')->withDatesProperty()->build();
        $model->published_at = $published_at;

        $this->assertNotNull($model->published_at_for_humans);
        $this->assertEquals('5 days ago', $model->published_at_for_humans);
    }

    /** @test */
    public function it_returns_a_human_timestamp_if_the_requested_attribute_is_contained_in_the_casts_array_casted_to_date_and_the_dates_array()
    {
        $published_at = now()->subDays(5);
        $model = (new ModelBuilder)->withTrait()->withCastsProperty('date')->withDatesProperty()->build();
        $model->published_at = $published_at;

        $this->assertNotNull($model->published_at_for_humans);
        $this->assertEquals('5 days ago', $model->published_at_for_humans);
    }

    /** @test */
    public function it_returns_a_human_timestamp_for_the_updated_at_datetime()
    {
        $created_at = now()->subDays(5);
        $model = (new ModelBuilder)->withTrait()->build();
        $model->created_at = $created_at;

        $this->assertNotNull($model->created_at_for_humans);
        $this->assertEquals('5 days ago', $model->created_at_for_humans);
    }

    /** @test */
    public function it_returns_a_human_timestamp_for_the_deleted_at_datetime()
    {
        $deleted_at = now()->subDays(5);
        $model = (new ModelBuilder)->withTrait()->withSoftDeletes()->build();
        $model->deleted_at = $deleted_at;

        $this->assertNotNull($model->deleted_at_for_humans);
        $this->assertEquals('5 days ago', $model->deleted_at_for_humans);
    }

    /** @test */
    public function it_returns_a_human_timestamp_for_the_created_at_datetime()
    {
        $updated_at = now()->subDays(5);
        $model = (new ModelBuilder)->withTrait()->withCastsProperty('datetime')->build();
        $model->updated_at = $updated_at;

        $this->assertNotNull($model->updated_at_for_humans);
        $this->assertEquals('5 days ago', $model->updated_at_for_humans);
    }

    /** @test */
    public function it_returns_null_if_the_requested_attribute_is_not_contained_in_the_casts_array_or_the_dates_array()
    {
        $published_at = now()->subDays(5);
        $model = (new ModelBuilder)->withTrait()->build();
        $model->published_at = $published_at;

        $this->assertNull($model->published_at_for_humans);
    }
}
