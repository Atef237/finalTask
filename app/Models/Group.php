<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [ 'id' , 'id_admin' , 'name_group' ];


    public function user(){

        return $this->belongsTo('App\Models\User');
    }

    public function member(){
        return $this->belongsToMany(Group_member::class);
    }
}
