<?php

namespace Tests\Unit\Models;

use Tests\ModelTestCase;
use App\Models\Comment;
use App\Models\User;
use App\Models\Review;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class CommentTest extends ModelTestCase
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
            'comment_content',
            'number_like',
            'number_dislike',
            'user_id',
            'review_id',
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

        $this->runConfigurationAssertions(new Comment(),
            $fillable, $hidden, $guarded, $visible, $casts, $dates, $collectionClass, $table, $primaryKey, $connection
        );

    }

    public function test_users_relation()
    {
        $m = new Comment();
        $r = $m->user();
        $key = 'user_id';
        $this->assertBelongsToRelation($r, $m, new User(), $key);
    }

    public function test_review_relation()
    {
        $m = new Comment();
        $r = $m->review();
        $key = 'review_id';
        $this->assertBelongsToRelation($r, $m, new Review(), $key);
    }
}
