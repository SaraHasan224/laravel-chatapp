<?php

namespace App\Http\Controllers;

use App\Events\CoordsLogged;
use App\Route;
use Illuminate\Http\Request;
use Javascript;
class RouteController extends Controller
{

//console.log(Laracasts.foo);
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
        $this->data['routes'] = Route::orderBy('id','DESC')->get();
        $coordinates = Route::orderBy('id','DESC')->pluck('coordinates');
        $this->data['coordinates'] = \JavaScript::put([$coordinates]);
        return view('admin.route',$this->data);
    }

    /**
     * Record activity for the model.
     *
     * @param  string $event
     * @return void
     */
    public function recordRouteCoords(Request $request)
    {
        $route = new Route();
        $route->coordinates = $request->coordinates;
        $route->user_id = Auth::user()->id;
        $route->save();

        broadcast(new CoordsLogged($route));

        $output = ['code' => 200, 'success' => 'Tags Edited Successfully'];
        return response()->json($output);
    }
}
