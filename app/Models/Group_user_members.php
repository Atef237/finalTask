<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group_user_members extends Model
{
    protected $fillable = ['group_id' , 'user_id'];

    public function groups(){
        return $this->belongsToMany(Group::class);
    }
}
