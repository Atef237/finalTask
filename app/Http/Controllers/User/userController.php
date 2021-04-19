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
use Illuminate\Support\Facades\Hash;

use Sentinel;
use Reminder;
use Mail;

class userController extends Controller
{
    public function login(){
        return view('user.auth.login');
    }

    public function postLogin(adminLoginRequest $request){

        dd(auth()->attempt(['email'=> $request->input('email'), 'password'=> $request->input('password')]));

        if (1){

            return redirect()->route('index');
        }
        return redirect()->back()->with(['error' => 'هناك خطأ بالبيانات']);

    }

    public function index(){

        $posts = Post::all();
        $comments = Comment::all();
        $likes = Like::all();

        return view('user.index',compact('posts','comments','likes'));
    }

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

    public function sendRequest($id){

        $friend = Friend::create();
        $friend -> sender_id = 1;
        $friend -> Future_id = $id;
        $friend -> save();

        return redirect()->route('AddFriends');
    }

    public function addComment($id){

         $post = Post::find($id);

         $comments = Comment::where('post_id',$id)->get();

         $likes = Like::where('post_id',$id)->get();

        return view('user.index',compact('post','comments','likes'));
    }

    public function postComment(Request $request){

        //return $request;
        $comment = Comment::create($request->except('_token','photo'));
        $comment -> post_id  = $request -> post_id;
        $comment -> user_id  = $request -> user_id;
        $comment -> text     = $request -> comment;
        $comment->save();

        return redirect()->route('index');

    }

    public function addLike(Request  $request ,$id){

        $like = Like::create($request->except('_token'));
        $like->user_id = 1;
        $like->post_id = $id;
        $like->save();

        return redirect()->route('index');

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

    public function forgotPass(){
        return view('user.auth.forgotPass');
    }

    public function resetPass(Request $request){

        //return $request;

        $user = User::whereEmail($request->email)->first();

        if($user){

            Mail::To($user->email) ->send(new forgotPass($user));
            return redirect()->route('login')->with(['success' => 'Reset Code Sent To Your Email']);
        }
    }

    public function updatePassword(){
        return "apdate password";
    }

}
