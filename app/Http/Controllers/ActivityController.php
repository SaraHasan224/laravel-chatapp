<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Events\ActivityLogged;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Debug\Debug;

class ActivityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->data['activities'] = Activity::orderBy('id','DESC')->with('user')->get();
        return view('admin.activity',$this->data);
    }

    /**
     * Record activity for the model.
     *
     * @param  string $event
     * @return void
     */
    public function recordActivity(Request $request)
    {

        $activity = new Activity();
        $activity->subject_id = $request->subject_id;
        $activity->subject_type = $request->subject_type;
        $activity->name = $request->name;
        $activity->user_id = Auth::user()->id;
        $activity->save();

//        event(new ActivityLogged($activity));
        broadcast(new ActivityLogged($activity));

        $output = ['code' => 200, 'success' => 'Tags Edited Successfully'];
        return response()->json($output);
    }
}
