<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\addPostRequest;
use App\Models\Post;
use App\Models\User;
use App\Traits\responsTrait;
use Illuminate\Http\Request;

class PostController extends Controller
{

    use responsTrait;

    public function posts(){
        $user_id = 23;
        $posts = Post::where('user_id',$user_id)->get();

        if($posts->count() > 0){
            return $this -> returnData('done','post',$posts);
        }else {
            return $this->returnError('1', 'no post found for you');
        }
    }

    public function add(Request $request){

        $post = Post::create();
        $post->title   = $request->title;
        $post->text    = $request->text;
        $post->user_id = $request->user_id;

        if( $post->save()){
            return $this -> returnData('Don','post',$post);
        }else{
            return $this -> returnError('1','Something happened, tried again');
        }
    }

    public function update(Request $request){

        $post =  Post::find($request -> post_id);

        if($post){

            $post -> update($request -> all());
            $post -> save();

            return $this->returnSuccessMsg('Updated','0');
        }else{
            return $this -> returnError('1','Something happened, tried again');
        }
    }

    public function delete(Request $request){


        $post =  Post::find($request -> post_id);

        if($post){
            $post -> delete();
            return $this->returnSuccessMsg('deleted','0');
        }else{
            return $this -> returnError('1','Something happened, tried again');
        }
    }



}
