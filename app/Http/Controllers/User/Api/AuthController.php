<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\User;
use App\Traits\responsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    use responsTrait;


    public function Login(Request $request){

        //return $request;

        if (Auth::attempt($request->only('email', 'password'))) {

            $user = Auth::user();                                                    // Data user
            $token = $user->createToken('token')->accessToken;                      //create token
            $user['token'] = $token;                                               // add token in user

            return $this->returnData('done','user',$user);
        }

        return $this -> returnError('1','هناك خطأ بالبيانات');
    }

    public function register( Request $request ){

        //return $request;
        $user = User::create();

        $user -> name = $request->name;
        $user -> email =$request->email;
        $user -> password = Hash::make($request->password);

        if($user -> save()){
             return $this->returnData('done','user',$user);
        }else {
            return $this->returnError('1', 'هناك خطأ بالبيانات');
        }

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
