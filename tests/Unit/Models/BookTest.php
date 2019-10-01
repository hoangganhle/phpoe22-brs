<?php

namespace Tests\Unit\Models;

use Tests\ModelTestCase;
use App\Models\Book;
use App\Models\Author;
use App\Models\User;
use App\Models\Review;
use App\Models\Rate;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class BookTest extends ModelTestCase
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
            'title',
            'book_content',
            'image',
            'price',
            'number_page',
            'view',
            'publisher_id',
            'category_id',
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
        $this->runConfigurationAssertions(new Book(),
            $fillable, $hidden, $guarded, $visible, $casts, $dates, $collectionClass, $table, $primaryKey, $connection
        );
    }

    public function test_author_relation()
    {
        $m = new Book();
        $r = $m->authors();
        $foreignKey = 'author_book.book_id';
        $relatedKey = 'author_book.author_id';
        $this->assertBelongsToManyRelation($r, $m, new Author(), $foreignKey, $relatedKey);
    }

    public function test_user_relation()
    {
        $m = new Book();
        $r = $m->users();
        $foreignKey = 'book_user.book_id';
        $relatedKey = 'book_user.user_id';
        $this->assertBelongsToManyRelation($r, $m, new User(), $foreignKey, $relatedKey);
    }

    public function test_review_relation()
    {
        $m = new Book();
        $r = $m->reviews();
        $this->assertHasManyRelation($r, $m, new Review());
    }

    public function test_rates_relation()
    {
        $m = new Book();
        $r = $m->rates();
        $this->assertHasManyRelation($r, $m, new Rate());
    }

    public function test_category_relation()
    {
        $m = new Book();
        $r = $m->category();
        $key = 'category_id';
        $this->assertBelongsToRelation($r, $m, new Category(), $key);
    }

    public function test_publisher_relation()
    {
        $m = new Book();
        $r = $m->publisher();
        $key = 'publisher_id';
        $this->assertBelongsToRelation($r, $m, new Publisher(), $key);
    }
}
