<?php

namespace App;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use DB;

class Follow extends Model
{

    protected $table = "followers";
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $connection = '';
    protected $fillable = [
        'user_id',
        'follows_id',
        'follow_state'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
