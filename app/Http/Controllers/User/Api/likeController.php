<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class likeController extends Controller
{
    public function addLike(Request  $request ,$id){

        $like = Like::create($request->except('_token'));
        $like->user_id = auth('admin')->user()->id;
        $like->post_id = $id;
        $like->save();

        return redirect()->route('index');

    }

}
