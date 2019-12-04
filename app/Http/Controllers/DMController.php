<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;
#use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\DMMessage;
use App\DMRecipients;

class DMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
    
    # GOAL: Load all the Authenticated user message and the respective recipient response/message to the dm
    # Return the respective DM View page with both messages
        
    # The Recipient chosen depends on the item clicked on the list of recipients
       $group_id = "1"; # For Testing Purpose 

       #getting the authenticated user id 
       $user_id = Auth::id();

       //get all the message written by both the authenticated user and the group/recipient from the dm_recipient model.
       $dm = DB::table('dm_recipients')->where('group_id', $group_id)->where('user_id', $user_id)->pluck('message_id');

       # trying to load the dm view page and sends a list of messages made by both user and recipient.
        return view('dm', ['dm' => $dm]);
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
        $dm = new DMMessage;

        # the message being sent to the recipient.
        $dm->message_body = $request->input('message_body');

        #getting the id of the authenticated user that created the message
        $request->user()->messages()->save($dm);

        #redirect to the dm page
        return redirect('dm')->with('dm', $dm);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        #GOAL: load the Dm page get the specific dm message

        return view('dm', ['dm' => DMMessage::findOrFail($id)]);
    }

}
