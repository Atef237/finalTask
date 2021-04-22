<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddUser;
use App\Http\Requests\Admin\adminLoginRequest;
use App\Mail\forgotPass;
use App\Models\Comment;
use App\Models\Friend;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Sentinel;
use Reminder;
use Mail;

class userController extends Controller
{



    public function index(){

        $posts = Post::where('accepted',1)->get();
        $comments = Comment::all('user_id','post_id');
        $likes = Like::all('user_id','post_id');

        return view('user.index',compact('posts','comments','likes'));
    }

    ###################################################################################

    public function showUsers(){

        $users = User::all();
        return view('user.users.showUsers',compact('users'));
    }

    public function addUsers(){

        return view('user.users.create');
    }

    public function postUser( AddUser $request){

        //return $request;
        $user = User::create($request->except('_token','password_confirmation'));

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::Make($request->password);

        $user->save();
        return redirect()->route('index');

    }

    public function edit($id){

        $user = User::find($id);

        if($user)
            return view('user.users.edit',compact('user'));
        else
            return redirect()->route('showUsers');

    }

    public function update( AddUser $request,$id ){


            $user = User::find($id);
            if($user){
                $user -> update($request->all());
                $user -> save();

                return redirect()->route('showUsers');
            }

            return redirect()->route('Brands')->with(['error'=>'الكلمة المرور القديمة غير صحصحة']);


    }

    public function destroy($id){

        $user = User::find($id);
        if($user){

            $user -> delete();
            return redirect()->route('showUsers');
        }
        return redirect()->route('Brands')->with(['error'=>'هذا id غير موجود']);

    }



}
