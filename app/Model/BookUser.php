<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    protected $table = 'book_users';
    protected $fillable = [
        'book_id',
        'user_id',
        'favorite',
    ];
}
