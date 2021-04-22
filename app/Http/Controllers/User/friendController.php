<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;

class friendController extends Controller
{



    public function AllFriends(){

        // في مشكله في العلاقه لازم تتحل الاول

        $users = User::all('id','first_name');
        $friends = Friend::where('accepted',1 )->get();
        $x = 0;
        return view('user.friends.myFriend',compact('users','friends','x'));

    }

    public function addFriend(){

        $users = User::all();

        return view('user.friends.sendRequest',compact('users'));
    }

    public function sendRequest($id){

        $friend = Friend::create();
        $friend -> sender_id = auth('web')->user()-> id ;
        $friend -> Future_id = $id;
        $friend -> save();

        return redirect()->route('AddFriends');
    }

    public function friendRequest(){

        return $friends = Friend::where('Future_id',auth('web')->user()->id && 'accepted',0)->get();
        //return view('user.friends.friendRequest',compact('friends'));
    }

    public function accept_request($id){

         Friend::where('id',$id )->update(array('accepted' => 1));

       return redirect()->route('friendRequest');

    }


}
