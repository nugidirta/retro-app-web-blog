<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Permission;
use App\Http\Requests;

class UsersController extends BackendController
{
    //

    public function __construct()
    {
        //$this->middleware('role:users');
    }

    // Index Page for Users
    public function index()
    {
        $users = User::paginate($this->limit);
        $usersCount = User::count();
        
        $params = [
            'title' => 'Users Listing',
            'users' => $users,
            'usersCount' => $usersCount,
        ];

        return view('backend.users.index')->with($params);
    }

    // Create User Page
    public function create()
    {
        $roles = Role::all();
        $user = new User();

        $params = [
            'title' => 'Create User',
            'roles' => $roles,
            'user' => $user,
        ];

        return view('backend.users.create')->with($params);
    }

    // Store New User
    public function store(Requests\UserStoreRequest $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|unique:users',
        //     'password' => 'required',
        // ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'slug' => $request->input('slug'),
            'bio' => $request->input('bio'),
        ]);

        // $role = Role::find($request->input('role_id'));

        // $user->attachRole($role);

        $user->attachRole($request->role);

        return redirect()->route('backend.users.index')->with('message', "The user <strong>$user->name</strong> has successfully been created.");
    }

    // Delete Confirmation Page
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);

            $params = [
                'title' => 'Confirm Delete Record',
                'user' => $user,
            ];

            return view('backend.users.delete')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Editing User Information Page
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);

            //$roles = Role::all();
            $roles = Role::with('permissions')->get();
            $permissions = Permission::all();

            $params = [
                'title' => 'Edit User',
                'user' => $user,
                'roles' => $roles,
                'permissions' => $permissions,
            ];

            return view('backend.users.edit')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Update User Information to DB
    public function update(Requests\UserUpdateRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            // $this->validate($request, [
            //     'name' => 'required',
            //     'email' => 'required|email|unique:users,email,' . $id,
            // ]);

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->slug = $request->input('slug');
            $user->bio = $request->input('bio');

            $user->save();

            // Update role of the user
            $roles = $user->roles;

            foreach ($roles as $key => $value) {
                $user->detachRole($value);
            }

            //$role = Role::find($request->input('role_id'));

            $user->attachRole($request->role);

            // Update permission of the user
            //$permission = Permission::find($request->input('permission_id'));
            //$user->attachPermission($permission);

            return redirect()->route('backend.users.index')->with('message', "The user <strong>$user->name</strong> has successfully been updated.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Remove User from DB with detaching Role
    public function destroy(Requests\UserDestroyRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $deleteOption = $request->delete_option;
            $selectedUser = $request->selected_user;

            if($deleteOption == "delete"){
                $user->posts()->withTrashed()->forceDelete();
                
            }elseif($deleteOption == "attribute"){
                $user->posts()->update(['author_id' => $selectedUser]);
            }

            // Detach from Role
            $roles = $user->roles;

            foreach ($roles as $key => $value) {
                $user->detachRole($value);
            }

            $user->delete();

            return redirect()->route('backend.users.index')->with('message', "The user <strong>$user->name</strong> has successfully been archived.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    public function confirm(Requests\UserDestroyRequest $request, $id)
    {

        $user = User::findOrFail($id);

        $users = User::where('id', '!=', $user->id)->pluck('name','id');

        return view("backend.users.confirm", compact('user','users'));
    }
}