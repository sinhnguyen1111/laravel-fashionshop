<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserInfoController extends Controller
{
    public function index($id){
        $info = User::find($id)->userInfo->first();
        dd($info->fullname );
        return view('backend.users.detail',['user_info'=>$info]);
        }
}
