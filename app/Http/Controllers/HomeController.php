<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
        $this->data['messages'] = Message::orderBy('id','DESC')->with('user')->get();
        return view('admin.dashboard',$this->data);
    }

    public function generatePublicEvent(Request $request)
    {
        $message  = new Message();
        $message->user_id = Auth::user()->id;
        $message->message = $request->message;
        $message->save();
        event(new MessageSent(Auth::user(),$message));
//        return redirect()->back();
        $output = ['code' => 200, 'success' => 'Tags Edited Successfully'];
        return response()->json($output);
    }
}
