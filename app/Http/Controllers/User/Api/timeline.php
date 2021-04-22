<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\Post;
use App\Traits\responsTrait;
use Illuminate\Http\Request;

class timeline extends Controller
{
    use responsTrait;

    public function friend(){

       // $user_id = 23;

        $friend = Friend::all();
        return $this -> returnData('done','post',$friend->posts());

    }
}
