<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public function addComment($id){

        $post = Post::find($id);

        $comments = Comment::where('post_id',$id)->get();

        $likes = Like::where('post_id',$id)->get();

        return view('user.posts.showPost',compact('post','comments','likes'));
    }

    public function postComment(Request $request){

        //return $request;
        $comment = Comment::create($request->except('_token','photo'));
        $comment -> post_id  = $request -> post_id;
        $comment -> user_id  = auth('admin')->user()-> id ;
        $comment -> text     = $request -> comment;
        $comment->save();

        return redirect()->route('index');

    }

}
