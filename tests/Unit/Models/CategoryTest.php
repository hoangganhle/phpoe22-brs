<?php

namespace Tests\Unit\Models;

use Tests\ModelTestCase;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class CategoryTest extends ModelTestCase
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
            'category_name',
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

        $this->runConfigurationAssertions(new Category(),
            $fillable, $hidden, $guarded, $visible, $casts, $dates, $collectionClass, $table, $primaryKey, $connection
        );

    }

    public function test_books_relation()
    {
        $m = new Category();
        $r = $m->books();
        $this->assertHasManyRelation($r, $m, new Book());
    }
}
