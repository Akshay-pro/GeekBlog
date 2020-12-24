<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('adminpanel.users.index',compact('users'));
    }

    public function create(){
        return view('adminpanel.users.create');
    }
}
