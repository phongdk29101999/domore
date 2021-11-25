<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPostLike extends Model
{
    protected $table = "user_post_like";
    protected $primaryKey = ['user_id', 'post_id'];
    public $incrementing = false;

    public $timestamps = false;
    protected $connection = '';
    protected $attributes = [
        'like_state'=>false,
    ];
    protected $fillable = [
        'post_id',
        'user_id'
    ];
}
