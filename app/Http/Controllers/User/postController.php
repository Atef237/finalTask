<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function Post(){
        return view('user.Posts.post');
    }

    public function addPost(Request $request){

        // return $request;

        $post = Post::create($request->except('_token'));
        $post->title = $request->title;
        $post->text = $request->text;
        $post->user_id = 1;
        $post->save();

        return redirect()->route('index');
    }

}
