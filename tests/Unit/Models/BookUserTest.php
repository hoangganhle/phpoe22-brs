<?php

namespace Tests\Unit\Models;

use Tests\ModelTestCase;
use App\Models\BookUser;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class BookUserTest extends ModelTestCase
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
            'book_id',
            'user_id',
            'favorite',
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

        $this->runConfigurationAssertions(new BookUser(),
            $fillable, $hidden, $guarded, $visible, $casts, $dates, $collectionClass, $table, $primaryKey, $connection
        );

    }

    public function test_book_relation()
    {
        $m = new BookUser();
        $r = $m->book();
        $key = 'book_id';
        $this->assertBelongsToRelation($r, $m, new Book(), $key);
    }

    public function test_user_relation()
    {
        $m = new BookUser();
        $r = $m->user();
        $key = 'user_id';
        $this->assertBelongsToRelation($r, $m, new User(), $key);
    }
}
