<?php

namespace Tests\Unit\Models;

use Tests\ModelTestCase;
use App\Models\Activity;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class ActivityTest extends ModelTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_model_configuration()
    {
        $fillable = [
            'activity_name',
            'type',
        ];
        $hidden = [];
        $guarded = ['*'];
        $visible = [];
        $casts = ['id' => 'int'];
        $dates = ['created_at', 'updated_at'];
        $collectionClass = Collection::class;
        $table = null;
        $primaryKey = 'id';
        $connection = null;

        $this->runConfigurationAssertions(new Activity(),
            $fillable, $hidden, $guarded, $visible, $casts, $dates, $collectionClass, $table, $primaryKey, $connection
        );

    }

    public function test_users_relation()
    {
        $m = new Activity();
        $r = $m->users();
        $foreignKey = 'activity_user.activity_id';
        $relatedKey = 'activity_user.user_id';
        $this->assertBelongsToManyRelation($r, $m, new User(), $foreignKey, $relatedKey);
    }
}
