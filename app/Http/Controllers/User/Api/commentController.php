<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\commentRequest;
use App\Http\Requests\User\deletCommentRequest;
use App\Http\Requests\User\updateCommentRequest;
use App\Models\Comment;
use App\Traits\responsTrait;
use Illuminate\Http\Request;

class commentController extends Controller
{

    use responsTrait;

    public function add(commentRequest $request){

        //return $request;
        $comment = Comment::create();
        $comment -> post_id  = $request -> post_id;
        $comment -> user_id  = $request -> user_id;
        $comment -> text     = $request -> comment;

        if( $comment->save()){
            return $this -> returnData('Don','comment',$comment);
        }else{
            return $this -> returnError('1','Something happened, tried again');
        }
    }

    public function delete( deletCommentRequest $request){

        $comment = Comment::find($request -> comment_id);

        if($comment){

            $comment -> delete();
            return $this->returnSuccessMsg('deleted','0');
        }else{
            return $this -> returnError('1','Something happened, tried again');
        }

    }

    public function update( updateCommentRequest $request){

        $comment = Comment::find($request -> comment_id );

        if($comment){

            $comment -> update($request -> all());
            $comment -> save();

            return $this->returnSuccessMsg('Updated','0');
        }else{
            return $this -> returnError('1','Something happened, tried again');
        }

    }

}
