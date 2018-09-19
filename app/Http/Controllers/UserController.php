<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getUser(){
        $users = Users::all();
        return ['users'=>$users];
    }
}