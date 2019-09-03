<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $table = 'user_activities';
    protected $fillable = [
        'user_id',
        'activity_id',
        'type_id',
    ];
}
