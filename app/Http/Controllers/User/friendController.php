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

        $users1 = User::all();
        $friend = Friend::all();

        return view('user.friends.myFriend',compact('users1','friend'));

    }

    public function addFriend(){

        $users = User::all();

        return view('user.friends.myFriend',compact('users'));
    }

    public function sendRequest($id){

        $friend = Friend::create();
        $friend -> sender_id = auth('admin')->user()-> id ;
        $friend -> Future_id = $id;
        $friend -> save();

        return redirect()->route('AddFriends');
    }

}
