<?php

namespace App\Http\Controllers\Admin;

use App\Difficulty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DifficultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $difficulties = Difficulty::all();
        return view('admin.difficulty.list', ['difficulties' => $difficulties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        $difficulty = new Difficulty();
        return view('admin.difficulty.form', ['difficulty' => $difficulty]);
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

        $new_difficulty = new Difficulty();
        $new_difficulty->name = $request->name;
        $new_difficulty->save();
        
        return redirect()->route('difficulty.list')->with('alert-success','Difficulty added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Difficulty  $difficulty
     * @return \Illuminate\Http\Response
     */
    public function show(Difficulty $difficulty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Difficulty  $difficulty
     * @return \Illuminate\Http\Response
     */
    public function edit(Difficulty $difficulty)
    {
        $difficulty = Difficulty::where('id', '=', $difficulty->id)->first();

        return view('admin.difficulty.form', ['difficulty' => $difficulty]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Difficulty  $difficulty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Difficulty $difficulty)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $data = Difficulty::where('id', $difficulty->id)->first();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('difficulty.list')->with('alert-success','Difficulty added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Difficulty  $difficulty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Difficulty $difficulty)
    {
        //
    }
}
