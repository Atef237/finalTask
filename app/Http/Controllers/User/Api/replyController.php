<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\User\addReplyRequest;
use App\Http\Requests\User\replyRequest;
use App\Models\replies;
use App\Traits\responsTrait;
use Illuminate\Http\Request;

class replyController extends Controller
{
    use responsTrait;

    public function add(addReplyRequest $request){

        //return $request;
        $reply =  replies::create();
        $reply -> comment_id  = $request -> comment_id;
        $reply -> user_id     = $request -> user_id;
        $reply -> text        = $request -> reply;

        if( $reply->save() ){
            return $this -> returnData('Don','comment',$reply);
        }else{
            return $this -> returnError('1','Something happened, tried again');
        }
    }

    public function delete( replyRequest $request){

        $reply = replies::find($request -> reply_id);

        if($reply){

            $reply -> delete();
            return $this->returnSuccessMsg('deleted','0');
        }else{
            return $this -> returnError('1','Something happened, tried again');
        }

    }

    public function update( replyRequest $request){

        $reply = replies::find($request -> reply_id );

        if($reply){

            $reply -> update($request -> all());
            $reply -> save();

            return $this->returnSuccessMsg('Updated','0');
        }else{
            return $this -> returnError('1','Something happened, tried again');
        }

    }

}
