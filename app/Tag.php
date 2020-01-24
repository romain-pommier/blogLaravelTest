<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = [
        'name'
    ];

    public function articles()
    {
        return $this->morphedByMany('App\Article', 'taggable');
    }



    public function comments()
    {
        return $this->morphedByMany('App\Comment', 'taggable');
    }
}
