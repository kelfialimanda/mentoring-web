<?php

namespace App\Http\Controllers\Admin;

use App\Target;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $targets = Target::all();
        return view('admin.target.list', ['targets' => $targets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        $target = new Target();
        return view('admin.target.form', ['target' => $target]);
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
            'name' => 'required|max:255',
        ]);

        $new_target = new Target();
        $new_target->name = $request->name;
        $new_target->save();
        
        return redirect()->route('target.list')->with('alert-success','Target added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $target = Target::where('id', '=', $id)->first();

        return view('admin.target.form', ['target' => $target]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Target $target)
    {
        $request->validate([
            'name' => 'required|max:255|unique:targets,name,'.$request->id.',id',
        ]);

        $data = Target::where('id', $request->id)->first();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('target.list')->with('alert-success','Target updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function destroy(Target $target)
    {
        //
    }
}
