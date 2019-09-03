<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book_user extends Model
{
    protected $table = 'book_users';
    protected $fillable = [
        'book_id',
        'user_id',
        'favorite',
    ];
}
