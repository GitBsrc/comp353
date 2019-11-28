<?php

namespace App\Http\Controllers;

use App\_Event_;
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

    public function show(_EventMembers_ $_EventMembers_)
    {
        $events = _EventMembers_::with('_Event_')->get();

        return view::make('event_list')->with('_Event_', $events);
    }

    public function edit(_EventMembers_ $_EventMembers_)
    {
        return view::make('event_member');
    }

    // Don't think we need it
    public function update(Request $request, _EventMembers_ $_EventMembers_)
    {
        //
    }

    public function destroy(_EventMembers_ $_EventMembers_, Request $request)
    {
        $this->validate($request, ['event_id' => 'required']);
        $events = $_EventMembers_::with('_Event_')->find($request->input('id'));
        // An event member has a pk made of 2 keys so how do i call that
    }
}
