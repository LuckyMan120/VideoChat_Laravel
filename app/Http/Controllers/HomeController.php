<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Pusher\Pusher;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public  function authenticate(Request $request){
        $socketId = $request->socket_id;
        $channelName = $request->channel_name;
        $pusher = new Pusher('2db4f742f5e0eb454937', 'e0e85acc4c7d7489de41', '643568', [
            'cluster' => 'ap2',
            'encrypted' => true
        ]);
        $presence_data = ['name' => auth()->user()->name];
        $key = $pusher->presence_auth($channelName, $socketId, auth()->id(), $presence_data);
        return response($key);

    }
}
