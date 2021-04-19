<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','first_name','last_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function replys(){
        return $this->hasMany('App\Models\Reply');
    }

    public function postss(){
        return $this->hasMany('App\Models\Post');
    }

    public function likes(){
        return $this->hasMany('App\Models\Like');
    }

    public function friends(){
        return $this->hasMany('App\Models\Friend');
    }

    public function groups(){
        return $this->hasMany('App\Models\Group');
    }
}
