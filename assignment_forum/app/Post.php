<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'contents', 'user_id'];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
// review request
