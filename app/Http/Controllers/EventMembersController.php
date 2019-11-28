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
        $members = _EventMembers_::with('_Event_')->get();

        return view::make('event_members')->with($members);
    }


    // Not sure you can edit an event member
    public function edit(_EventMembers_ $_EventMembers_)
    {
        return view::make('event_member');
    }

    // Don't think we need it
    public function update(Request $request, _EventMembers_ $_EventMembers_)
    {
        //
    }

    // To remove an event member
    public function destroy($id)
    {
        $event_member = _EventMembers_::find($id);
        $event_member->delete();

        return redirect('event_members');
    }
}
