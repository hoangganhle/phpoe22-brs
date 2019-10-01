<?php

namespace Tests\Unit\Models;

use Tests\ModelTestCase;
use App\Models\Author;
use App\Models\Book;
use App\Models\AuthorBook;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class AuthorTest extends ModelTestCase
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
            'author_name',
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

        $this->runConfigurationAssertions(new Author(),
            $fillable, $hidden, $guarded, $visible, $casts, $dates, $collectionClass, $table, $primaryKey, $connection
        );

    }

    public function test_books_relation()
    {
        $m = new Author();
        $r = $m->books();
        $foreignKey = 'author_book.author_id';
        $relatedKey = 'author_book.book_id';
        $this->assertBelongsToManyRelation($r, $m, new Book(), $foreignKey, $relatedKey);
    }
}
