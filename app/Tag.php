<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";
    protected $primaryKey = 'tag_id';
    public $timestamps = false;
    protected $connection = '';
    protected $fillable = [
        'tag_id',
        'tag_title',
        'quantity'
    ];
    public function posts() {
        return $this->belongsToMany('App\Post', 'post_tag', 'tag_id', 'post_id');
    }
}
