<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\GroupRequest;
use App\Models\Group;
use App\Models\Group_member;
use App\Models\Group_user_members;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function create(){
        return view('user.group.create');
    }

    public function postGroup(GroupRequest $request){

        $group = Group::create();
        $group -> group_name = $request->title;
        $group -> admin_id = auth('web')->user()->id;
        $group->save();

        return redirect()->route('index');

    }

    public function show(){

        $groups = Group::all();

        return view('user.group.index',compact('groups'));
    }

    public function join($id){

        $group_member = Group_user_members::create();

        $group_member -> group_id = $id;
        $group_member -> user_id = auth('web')->user()->id;

        $group_member ->save();
        return redirect()->back();


    }
}
