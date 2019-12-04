<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dmrecipients;

class DMRecipientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #getting all the authenticates users
       # $user_id = Auth::id();
        #get all the dm recipients from the DMRecipient model
        #$dmrecipients = DMRecipients::where()
        #open up the dm recipient page and load the dm recipient list according to the user
        $name = ["Bob", "Jim", "Tim"];
        return view('dm_recipients', ['name' => $name]);
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
        $dm_recipient = new DMRecipients();
        $dm_recipient->user_id= $request->input('user_id');
        $dm_recipient->message_id= $request->input('message_id');
        $dm_recipient->group_id= $request->input('group_id');
        $dm_recipient->save();
        #redirect to the dm recipient page with dm recipient page.
        return redirect('dm_recipients')->with('dm_recipient', $dm_recipient);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dm_recipient', ['dm_recipient' => DMRecipient::findOrFail($id)]);
    }

    

    
    
}
