<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author_book extends Model
{
    protected $table = 'author_books';
    protected $fillable = [
        'author_id',
        'book_id',
    ];
}
