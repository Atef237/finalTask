<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{

    protected $fillable = [
        'sender_id' , 'Future_id','accepted'
    ];

    public function user(){

        return $this->belongsTo('App\Models\User');
    }
}
