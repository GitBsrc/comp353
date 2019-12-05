<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DMMessage;
use App\DMRecipients;
use App\User;
use Illuminate\Support\Facades\Auth;

class DMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function messageForm($id)
    {
        #get the authenticated user
        $user_id = Auth::id();

        #get all the dm messages
        $mess_id = DMRecipients::all();

       #Parameters:
         # user -> authenticated user
         # recipient -> person you are sending the dm to 
         # dms -> list of all the dm recipient objects(id, recipient, message_id)
        return view('dm.message', ['user'=> $user_id, 'recipient'=>User::find($id), 'dms'=>$mess_id]);        
    }

    /**
     * Send Message
     *
     */
    public function message(Request $request, $id)
    {
        $dm = new DMMEssage();
        $dm->sender = Auth::id();
        $dm->message_body = $request->input('message');
        $dm->save();

        $recipient = new DMRecipients();
        $recipient->recipient = $id;
        $recipent->message_id = $dm->id;
        $recipient->save();

        return redirect('/dm/message/'.$id);        
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
