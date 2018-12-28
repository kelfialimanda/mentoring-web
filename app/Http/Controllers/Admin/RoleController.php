<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::where('name', '!=', 'admin')->get();
        return view('admin.role.list', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        return view('admin.role.form');
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
            'name' => 'required|unique:roles|max:255'
        ]);

        $new_role = new Role();
        $new_role->name = $request->name;
        $new_role->save();
        return redirect()->route('admin.role.list')->with('alert-success','Role added successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:255'
        ]);
        $data = Role::where('id', $role->id)->first();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('admin.role.list')->with('alert-success','Role successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $data = Role::where('id', $role->id)->first();
        $data->delete();
        return redirect()->route('admin.role.list')->with('alert-success','Role successfully deleted!');
    }
}
