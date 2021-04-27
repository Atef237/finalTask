<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $touches = ['likes'];


    protected $fillable = [
        'user_id', 'text','group_id','title','accepted'
    ];

    public function user(){
        return $this->BelongsTo('App\Models\User');
    }

    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }

    public function like(){

        return $this->hasMany('App\Models\Like');
    }

    public function likes(){
        return $this -> morphMany(like_morph::class,like);
    }
}
