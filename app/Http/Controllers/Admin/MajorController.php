<?php

namespace App\Http\Controllers\Admin;

use App\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Major::all();
        return view('admin.major.list', ['majors' => $majors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        $major = new Major();
        return view('admin.major.form', ['major' => $major]);
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
            'code' => 'required|unique:majors'
        ]);

        $new_major = new Major();
        $new_major->code = $request->code;
        $new_major->name = $request->name;
        $new_major->save();
        return redirect()->route('major.list')->with('alert-success','Major added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $major = Major::where('id', '=', $id)->first();
        return view('admin.major.form', ['major' => $major]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Major $major)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|unique:majors,code,'.$request->id.',id'
        ]);

        $data = Major::where('id', $request->id)->first();
        $data->code = $request->code;
        $data->name = $request->name;
        $data->save();

        return redirect()->route('major.list')->with('alert-success','Major added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {
        //
    }
}
