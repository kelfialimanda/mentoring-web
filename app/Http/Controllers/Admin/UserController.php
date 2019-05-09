<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('name', '!=', 'admin')->get();
        return view('admin.user.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        $user = new User();
        $roles = Role::where('name', '!=', 'admin')->get();

        return view('admin.user.form', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', '=', $id)->first();
        $roles = Role::where('name', '!=', 'admin')->get();

        return view('admin.user.form', ['user'=>$user, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'role_id' => 'required',
        ]);

        $new_user = new User();
        $new_user->npm = $request->npm;
        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->password = bcrypt($request->password);
        $new_user->role_id = $request->role_id;
        $new_user->save();
        return redirect()->route('user.list')->with('alert-success','User added successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:users,email,'. $request->id .',id|max:255',
            // 'password' => 'required|max:255',
            'role_id' => 'required',
        ]);

        $data = User::where('id', $request->id)->first();
        $data->npm = $request->npm;
        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->password != "" && count($request->password) > 0)
        {
            $data->password = bcrypt($request->password);
        }
        $data->role_id = $request->role_id;
        $data->save();
        return redirect()->route('user.list')->with('alert-success','User edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $data = User::where('id', $user->id)->first();
        $data->delete();
        return redirect()->route('admin.user.list')->with('alert-success','User successfully deleted!');
    }
}
