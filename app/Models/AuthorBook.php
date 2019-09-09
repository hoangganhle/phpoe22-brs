<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorBook extends Model
{
    protected $table = 'author_book';
    protected $fillable = [
        'author_id',
        'book_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function authorBook()
    {
        return $this->belongsTo(AuthorBook::class, 'author_id');
    }
}
