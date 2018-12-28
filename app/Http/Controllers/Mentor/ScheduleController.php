<?php

namespace App\Http\Controllers\Mentor;

use Auth;
use App\Schedule;
use App\Major;
use App\Target;
use App\Difficulty;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
	    $schedules = Schedule::where('mentor_id', '=', Auth::User()->id)->get();
	    return view('mentor.schedule.list', ['schedules' => $schedules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        $schedule = new Schedule();
        $majors = Major::all();
        $targets = Target::all();
        $difficulties = Difficulty::all();
        $mentors = User::where('name', '!=', 'admin')->where('role_id', '=', 2)->get();
        return view('mentor.schedule.form', ['schedule' => $schedule, 'majors' => $majors, 'targets' => $targets, 'difficulties' => $difficulties, 'mentors' => $mentors]);
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
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'major_id' => 'required',
            'difficulty_id' => 'required',
            'target_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $new_schedule = new Schedule();
        $new_schedule->title = $request->title;
        $new_schedule->subtitle = $request->subtitle;
        $new_schedule->description = $request->description;
        $new_schedule->major_id = $request->major_id;
        $new_schedule->difficulty_id = $request->difficulty_id;
        $new_schedule->target_id = $request->target_id;
        $new_schedule->start_date = $request->start_date;
        $new_schedule->end_date = $request->end_date;
        $new_schedule->status = 0;
        $new_schedule->mentor_id = Auth::User()->id;
        $new_schedule->save();

        return redirect()->route('mentor.schedule.all')->with('alert-success','Schedule requested successfully!');
    }
}
