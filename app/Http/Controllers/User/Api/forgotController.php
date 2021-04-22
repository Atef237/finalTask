<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\resetRequest;
use App\Http\User\Requests\ForgotRequest;
use App\Mail\forgotPass;
use App\Models\User;
use App\Traits\responsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class forgotController extends Controller
{

    use responsTrait;

    public function forgot(Request $request){

        $email = $request->email;

        if(User::where('email',$email)->get()){

            $token  = str::random(20);
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
            ]);

            Mail::To($email) ->send(new forgotPass($token));

            return $this -> returnSuccessMsg('chek your email');

        }else{
            return $this -> returnError('1','doen\'t exists');


        }

    }


    public function reset( resetRequest $request){

        $token = $request->token;

        if(!$passwordReset = DB::table('password_resets')->where('token',$token)->first()){
            return $this -> returnError('1','invalid Token');
        }

        if(!$user = User::where('email',$passwordReset->email)->first()){

            return $this -> returnError('1','doen\'t exists');
        }

        $user -> password =  Hash::Make($request->password);
        if($user -> save()){
            return $this -> returnSuccessMsg('success ');
        }else{
            return $this -> returnError('1','Something went wrong');

        }
    }
}
