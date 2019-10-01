<?php

namespace Tests\Unit\Models;

use Tests\ModelTestCase;
use App\Models\Publisher;
use App\Models\Book;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class PublisherTest extends ModelTestCase
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
            'publisher_name',
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

        $this->runConfigurationAssertions(new Publisher(),
            $fillable, $hidden, $guarded, $visible, $casts, $dates, $collectionClass, $table, $primaryKey, $connection
        );

    }

    public function test_users_relation()
    {
        $m = new Publisher();
        $r = $m->books();
        $this->assertHasManyRelation($r, $m, new Book());
    }
}
