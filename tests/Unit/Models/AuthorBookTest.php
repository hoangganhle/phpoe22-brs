<?php

namespace Tests\Unit\Models;

use Tests\ModelTestCase;
use App\Models\AuthorBook;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class AuthorBookTest extends ModelTestCase
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
            'author_id',
            'book_id',
        ];
        $hidden = [];
        $guarded = ['*'];
        $visible = [];
        $casts = ['id' => 'int'];
        $dates = ['created_at', 'updated_at'];
        $collectionClass =Collection::class;
        $table = null;
        $primaryKey = 'id';
        $connection = null;
        $this->runConfigurationAssertions(new AuthorBook(),
            $fillable, $hidden, $guarded, $visible, $casts, $dates, $collectionClass, $table, $primaryKey, $connection
        );
    }

    public function test_author_relation()
    {
        $m = new AuthorBook();
        $r = $m->author();
        $key = 'author_id';
        $this->assertBelongsToRelation($r, $m, new Author(), $key);
    }

    public function test_book_relation()
    {
        $m = new AuthorBook();
        $r = $m->book();
        $key = 'book_id';
        $this->assertBelongsToRelation($r, $m, new Book(), $key);
    }
}
