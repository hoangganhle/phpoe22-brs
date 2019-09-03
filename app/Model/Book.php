<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'title',
        'description',
        'book_content',
        'image',
        'price',
        'number_page',
        'view',
        'publisher_id',
        'category_id',
    ];
}
