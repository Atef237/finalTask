<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\joinGroup;
use App\Http\Requests\User\GroupRequest;
use App\Models\Group;
use App\Models\Group_member;
use App\Models\Group_user_members;
use App\Traits\responsTrait;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    use responsTrait;

    public function create(GroupRequest $request){

        $group = Group::create();
        $group -> group_name = $request->group_name;
        $group -> admin_id = $request -> id;

        if( $group->save() ){
            return $this -> returnData('Don','comment',$group);
        }else{
            return $this -> returnError('1','Something happened, tried again');
        }

    }

    public function show(){

        $groups = Group::all('id','admin_id','group_name');

        if( $groups -> count() > 0 ){
            return $this -> returnData('Don','group',$groups);
        }else{
            return $this -> returnError('1','Something happened, tried again');
        }

    }

    public function join(joinGroup $request){

        $group_member = Group_user_members::create();

        $group_member -> group_id = $request -> group_id;
        $group_member -> user_id  = $request -> user_id;

        if( $group_member->save() ){
            return $this -> returnSuccessMsg('join');
        }else{
            return $this -> returnError('1','Something happened, tried again');
        }



    }

    public function out($id){

        $group_member = Group_user_members::find($id);

        if( $group_member->count() > 0 ){
            $group_member -> delete();
            return $this -> returnSuccessMsg('Done out');
        }else{
            return $this -> returnError('1','Something happened, tried again');
        }
    }
}
