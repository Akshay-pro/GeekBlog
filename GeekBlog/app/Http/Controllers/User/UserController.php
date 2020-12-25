<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public $roles;
    public function __construct()
    {
        $this->roles=Role::all();
    }
    public function index(){
        $users=User::all();
        return view('adminpanel.users.index',compact('users'));
    }

    public function create(){
        return view('adminpanel.users.create')->with('roles',$this->roles);
    }

    public function store(Request $request){
        $user=User::create($request->all());
        $user->assignRole($request->role_id);
        return $this->redirectUser('User Created Successfully');
    }

    public function edit(User $user){
        return view('adminpanel.users.edit',compact('user'))->with('roles',$this->roles);
    }

    public function update(Request $request, User $user){
        $user->update($request->all());
        $user->syncRoles([$request->role_id]);
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
