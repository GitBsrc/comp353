<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DMRecipients;

class DMRecipientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ## GOAL: This method is meant to pass the list of friends/group of the authenticated user to the dm_recipient list view page
       
        #getting the id of the authenticates users
         $user_id = Auth::id();

        #get a list of all the the dm recipients/group from the DMRecipient model
        $dmrecipients = DB::table('dm_recipients')->where('user_id', $user_id)->pluck('group_id');

        #open up the dm_recipient view page and load the recipient list according to the user
        $name = ["Bob", "Jim", "Tim"]; #test data (for testing purpose). Unable to retrieve data from db tables.

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
        #GOAL: This method is meant to store the data when an user send a dm to a group/friend on the dm view page.
        $dm_recipient = new DMRecipients;

        # the id of the user that created the message
        $dm_recipient->user_id= $request->input('user_id');

        # the message id of the message being sent to the recipient
        $dm_recipient->message_id= $request->input('message_id');

        # the id of the message being sent to
        $dm_recipient->group_id= $request->input('group_id');

        $dm_recipient->save();

        #redirect to the dm view page with the dm recipient object created. So that these info can be 
        # displayed on the dm frontend
        return redirect('dm')->with('dm_recipient', $dm_recipient);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        # GOAL: meant to return the dm view page that is shared between the authenticated user and group/friend id
        # the "id" that is being passed is the group id.

        return view('dm_recipient', ['dm_recipient' => DMRecipient::findOrFail($id)]);
    }

    

    
    
}
