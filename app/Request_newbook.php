<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request_newbook extends Model
{
    protected $table = 'request_newbooks';
    protected $fillable = [
        'book_name',
        'author',
        'request_content',
        'user_id',
        'status',
    ];
}
