<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddPost;
use App\Http\Requests\Admin\AddUser;
use App\Http\Requests\Admin\adminLoginRequest;
use App\Models\Post;
use App\Models\User;
use Cassandra\Exception;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function postLogin(adminLoginRequest $request){

        //return $request;

        if (auth()->guard('admin')->attempt(['email'=> $request->input('email'), 'password'=> $request->input('password')])){

            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with(['error' => 'هناك خطأ بالبيانات']);

    }

    public function index(){

        $posts = Post::all();
        return view('admin.index',compact('posts'));
    }

    public function allUsers(){
        $users = User::all();
        return view('admin.Users.index',compact('users'));

    }

    public function editUser($id){
        $user = User::find($id);

        return view('admin.Users.edit',compact('user'));
    }

    public function updateUser( AddUser $request, $id){

        $user = User::find($id);
        if($user){

            $user -> update($request -> all());
            $user->name = $request -> name;
            $user->email = $request -> email;
            $user -> save();

            return redirect()->route('AllUsers')->with(['success'=>'تم التحديث بنجاح']);
        }
        return redirect()->route('AllUsers')->with(['error'=>'حدثت مشكلة ما حاول مرة اخري']);

    }

    public function deleteUser($id){

    }

    public function Postt(){
        return view('admin.posts.index');
    }
    /*
        public function addPostt(AddPost $request){


                $post = Post::create($request -> except('_token'));

                $post -> text = $request->text;
                $post -> title = $request->title;
                $post -> user_id = $request->id;
                $post -> save();

                return redirect()->route('admin.dashboard')->with(['success'=>'تم الاضافة بنجاح']);

    }
    */
}
