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

    public function store(Request $request){
        $user=User::create($request->all());

        $this->redirectUser('User Created Successfully');
    }

    public function edit(User $user){
        return view('adminpanel.users.edit',compact('user'));
    }

    public function update(Request $request, User $user){
        $user->update($request->all());
        return $this->redirectUser('User Updated Successfully');
    }

    public function destroy(User $user){
        $user->delete();
        return $this->redirectUser('User Deleted Successfully');
    }

    protected function redirectUser(String $msg){
        return redirect()
        ->route('user.index')
        ->with('success',$msg);
    }
    
}
