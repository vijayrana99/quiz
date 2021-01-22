<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::orderBy('updated_at', 'desc')->paginate(20);
        
        return view('backend.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();

        return view('backend.users.create', ['roles' => $roles]);
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
            'name'     =>'required|max:120',
            'email'    =>'required|email|unique:users',
            'password' =>'required|min:5|confirmed'
        ]);
        
        $user = User::create([
                                'name' => $request->name, 
                                'email' => $request->email, 
                                'password' => bcrypt($request->password)
                            ]); 

        $role    = $request->role;
        $my_role = Role::where('id', '=', $role)->firstOrFail();
        
        $user->assignRole($my_role); //Assigning role to user

        // flash('User successfully added!')->success();
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id); //Get user with specified id
        $roles = Role::get(); //Get all roles
        $permissions = Permission::all();
        
        return view('backend.users.edit', compact('user', 'roles', 'permissions')); //pass user and roles data to view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        //Validate name, email and password fields
        $this->validate($request, [
            'name'     =>'required',
            'email'    =>'required|email|unique:users,email,'.$id,
            'admin_password' =>'required'
        ]);

        //check admin password
        if ( ! \Hash::check($request->admin_password, Auth::user()->password)) {

            return redirect()->back()->with('error', 'Wrong admin password.');
        }

        $user = User::findOrFail($id); //Get role specified by id
        
        if ($request->password) {
            $user->email = $request->email; 
            $user->name = $request->name; 
            $user->password = bcrypt($request->password); 
        } else {
            $user->email = $request->email; 
            $user->name = $request->name; 
        }
        
        $user->save();
        
        $roles = $request['roles']; //Retreive all roles
        
        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        } else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }

        return redirect()->route('user.index')->with('success', 'User successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User successfully deleted.');
    }

        
    /**
     * update user permissions
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function updatePermission(Request $request, $id)
    {

        $user = User::findOrFail($id);

        //Validate name, email and password fields
        $this->validate($request, [
            'admin_password' =>'required'
        ]);

        if ( ! \Hash::check($request->admin_password, Auth::user()->password)) {

            return redirect()->back()->with('error', 'Wrong admin password.');
        }

        $permissions = $request->permissions;

        $user->revokePermissionTo($permissions);    //revoke all previous permissions
        $user->givePermissionTo($request->permissions); //assign permissions

        return redirect()->route('user.index')->with('success', 'Permissions updated successfully.');
    }
}
