<?php

namespace App\Http\Controllers;

use App\_EventMembers_;
use Illuminate\Http\Request;

class EventMembersController extends Controller
{
    public function index()
    {
       // TODO: Create event members view
       return view::make('event_member');
    }

    public function create()
    {
        return view::make('event_member');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['user_id' => 'required', 'event_id' => 'required', 'member_type_id' => 'required']);
        $event_member = new _EventMembers_();
        $event_member->user_id = $request->input('user_id');
        $event_member->event_id = $request->input('event_id');
        $event_member->member_id = $request->input('member_id');

        return redirect('event_member')->with('event_member', $event_member);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\_EventMembers_  $_EventMembers_
     * @return \Illuminate\Http\Response
     */
    public function show(_EventMembers_ $_EventMembers_)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\_EventMembers_  $_EventMembers_
     * @return \Illuminate\Http\Response
     */
    public function edit(_EventMembers_ $_EventMembers_)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\_EventMembers_  $_EventMembers_
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, _EventMembers_ $_EventMembers_)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\_EventMembers_  $_EventMembers_
     * @return \Illuminate\Http\Response
     */
    public function destroy(_EventMembers_ $_EventMembers_)
    {
        //
    }
}
