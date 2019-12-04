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
     */
    public function messageForm($id)
    {
        $user_id = Auth::id();

        $messages = DMMEssage::all();
        
        // $messages = DMMEssage::find('user_id', $id);

        // $recipient = $messages->recipients;

        // $dms = $messages->merge($recipient);

        // $recipentMessages = DMMEssage::find('user_id', $id)->all();



        return view('dm.message', ['user'=>User::find($user_id), 'recipient'=>User::find($id), 'dms'=>$messages]);        
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

        return redirect('/dm/'.$id);        
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
