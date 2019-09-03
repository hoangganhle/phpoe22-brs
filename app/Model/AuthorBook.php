<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AuthorBook extends Model
{
    protected $table = 'author_books';
    protected $fillable = [
        'author_id',
        'book_id',
    ];
}
