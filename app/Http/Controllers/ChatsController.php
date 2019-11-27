<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* Events */
use App\Events\MessageSent;
/* FASCADE */
use Illuminate\Support\Facades\Auth;
class ChatsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message = "Hi!! Testing";
        event(new MessageSent($message));
        return view('admin.chat.index');
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
//        $user = Auth::user();
//
//        $message = $user->messages()->create([
//            'message' => $request->input('message')
//        ]);
        $message = "Hi!! Testing";
        broadcast(new MessageSent($message))->toOthers();

//        return ['status' => 'Message Sent!'];
    }
}
