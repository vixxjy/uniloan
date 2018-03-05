<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Permission;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::orderby('id', 'desc')->get();
        return view('users.index', compact('users'));
    }
    
    public function profile(){
        return view('users.dashboard');
    }
    
    public function create()
    {
        $roles = Role::get();        
        return view('users.create', compact('roles'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'roles' => 'required'
        ]);
        $user = User::create([$request->except('roles'),
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)]);
        
        if($request->roles <> ''){
            $user->roles()->attach($request->roles);
        }
        return redirect()->back()->with('success','User has been created successfully');            
        
    }
    
    public function edit($id) {
        $user = User::findOrFail($id);
        $roles = Role::get(); 
        return view('users.edit', compact('user', 'roles')); 
       
    }
    
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);   
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:6|confirmed'
        ]);
        $input = $request->except('roles');
        $user->fill($input)->save();
        if ($request->roles <> '') {
            $user->roles()->sync($request->roles);        
        }        
        else {
            $user->roles()->detach(); 
        }
        return redirect()->route('users.index')->with('success',
             'User successfully updated.');
    }
    
    public function destroy($id) {
        $user = User::findOrFail($id); 
        $user->delete();
        return redirect()->route('users.index')->with('success',
             'User successfully deleted.');
    }

}
