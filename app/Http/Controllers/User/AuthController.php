<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\adminLoginRequest;
use App\Http\Requests\User\Regiestration;
use App\Mail\forgotPass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('user.auth.register');

    }

    public function store(  ){

        //return $request;
        $user = User::create();

        $user -> first_name = "yousef";
        $user -> last_name = "ali";
        $user -> email = "ali@gmail.com";
        $user -> password = Hash::make(123456789);

        $user -> save();
        return redirect()->route('login');

    }

    public function login(){
        return view('user.auth.login');
    }

    public function postLogin(adminLoginRequest $request){

        //return $request;



        if (auth()->guard('web')->attempt(['email'=> $request->input('email'), 'password'=> $request->input('password')])){

            return redirect()->route('index');
        }
        return redirect()->back()->with(['error' => 'هناك خطأ بالبيانات']);

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
