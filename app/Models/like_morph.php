<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class like_morph extends Model
{
    protected $fillable = ['user_id','like_type','like_id'];


    public function like(){
        return $this -> morphTo();
    }
}
