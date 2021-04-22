<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class replies extends Model
{
    protected $fillable = [
        'user_id', 'comment_id', 'text'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function comments(){
        return $this->belongsTo('App\Models\Comment');
    }
}