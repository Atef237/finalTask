<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\Post;
use App\Models\User;
use App\Traits\responsTrait;
use Illuminate\Http\Request;

class friendController extends Controller
{
    use responsTrait;


    public function All(Request $request){

        // في مشكله في العلاقه
        //$users = User::all();
        $friends = Friend::where('sender_id',$request->id)->orWhere('Future_id', $request->id)->get();

        if($friends->count() > 0){
            return $this -> returnData('done','friend', $friends );
        }else {
            return $this->returnError('1', 'no post found for you');
        }

    }

    public function sendRequest(Request $request){

        $friend = Friend::create();
        $friend -> sender_id = $request->sender_id;
        $friend -> Future_id = $request->Future_id;
        $friend -> save();
        if($friend){
            return $this -> returnData('done','friend', $friend );
        }else {
            return $this->returnError('1', 'no post found for you');
        }
    }

    public function friendRequest(Request $request){

        return $friends = Friend::where('Future_id',$request->sender_id && 'accepted',0)->get();
        //return view('user.friends.friendRequest',compact('friends'));
    }

    public function accept_request($id){

         Friend::where('id',$id )->update(array('accepted' => 1));

       return redirect()->route('friendRequest');

    }
}