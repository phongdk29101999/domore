<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $table = "post_tag";
    protected $primaryKey = ['post_id', 'tag_id'];
    public $incrementing = false;

    public $timestamps = false;
    protected $connection = '';
    protected $fillable = [
        'post_id',
        'tag_id'
    ];

    public function post(){
        return $this->belongsTo('App\Post', 'post_id');
    }

    public function tag(){
        return $this->belongsTo('App\Tag','tag_id');
    }
}
