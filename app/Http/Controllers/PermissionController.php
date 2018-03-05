<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get(); //Get all roles
        return view('permissions.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        
        $name = $request['name'];
        $permission = new Permission();
        $permission->name = $request->name;
        $roles = $request['roles'];
        $permission->save();
       
       
       if (!empty($request['roles'])) {
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail();

                $permission = Permission::where('name', '=', $name)->first();
                $r->givePermissionTo($permission);
            }
        }
        return redirect()->back()->with('success','Permission added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $permission = Permission::findOrFail($id);

        return view('permissions.edit', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name'=>'required',
        ]);
        $permission->name=$request->name;
        $permission->save();
        return redirect()->route('permissions.index')
            ->with('success',
             'Permission'. $permission->name.' updated!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
         if ($permission->name == "Admin") {
            return redirect()->route('permissions.index')
            ->with('flash_message',
             'Cannot delete this Permission!');
        }
        
        $permission->delete();
        return redirect()->route('permissions.index')
            ->with('success',
             'Permission deleted successfully!');
    }
}
