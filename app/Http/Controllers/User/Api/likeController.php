<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
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

    public function addLikeMorph(Request $request,$id){

         $post = Post::findOrFail($id)->get();
         $post -> likes()->create([
             'user_id' => $request -> user_id,
         ]);
        $post -> save();
    }

}
