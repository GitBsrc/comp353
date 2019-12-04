<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\dmmessage;

class DMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       #getting the authenticated user id 
      # $user_id = Auth::id();
       //get all the message written by the authenticated user from the DMMessage model.
      # $dm = DMMessage::where('id', $user_id)->get();
       # trying to load the dm view page and sends a list dm_mess
      # return view('dm', ['dm_message' => $dm]);
        return view('dm');
        #return 'INDEX';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dm = new DMMessage();
        $dm->message_body = $request->input('message_body');
        #getting the user that created the message
        $request->user()->messages()->save($dm);
        #redirect to the dm page
        return redirect()->route('dm');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        #load the dm page get the specific dm message
        return view('dm', ['dm' => DMMessage::findOrFail($id)]);
    }

}
