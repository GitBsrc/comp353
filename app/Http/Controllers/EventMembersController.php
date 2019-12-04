<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventMembers;
use Illuminate\Support\Facades\Auth;
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

    public function join($id) {
        $member = new EventMembers();
        $member->event_id = $id;
        $member->user_id = Auth::id();
        $member->member_type_id = 1; // member
        $member->save();
        return redirect('/event/'.$id);
    }

    public function leave($id) {
        $member = EventMembers::where('event_id', $id)->where('user_id', Auth::id());
        $member->delete();
        return redirect('/profile');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['user_id' => 'required', 'event_id' => 'required', 'member_type_id' => 'required']);
        $event_member = new EventMembers();
        $event_member->user_id = $request->input('user_id');
        $event_member->event_id = $request->input('event_id');
        $event_member->member_id = $request->input('member_id');

        return redirect('event_member')->with('event_member', $event_member);
    }

    public function show(EventMembers $EventMembers)
    {
        $members = EventMembers::with('Event')->get();

        return view::make('event_members')->with($members);
    }


    // Not sure you can edit an event member
    public function edit(EventMembers $EventMembers)
    {
        return view::make('event_member');
    }

    // Don't think we need it
    public function update(Request $request, EventMembers $EventMembers)
    {
        //
    }

    // To remove an event member
    public function destroy($id)
    {
        $event_member = EventMembers::find($id);
        $event_member->delete();

        return redirect('event_members');
    }
}
