<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'comment_content',
        'number_like',
        'number_dislike',
        'user_id',
        'review_id',
    ];
}
