<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventMembers;
use App\EventMemberType;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventMembersController extends Controller
{
    public function get($id)
    {
        $isAdmin = in_array(Auth::id(), User::where('user_type_id', 2)->pluck('id')->all());

        $event = Event::find($id);
        $members = EventMembers::where('event_id', $id)->get();
        $users = array();
        foreach($members as $member){
            $users[] = array(
                "name"=>User::find($member->user_id),
                "memberType"=>EventMemberType::find($member->member_type_id)->type
            );
        }
        return view('event_members', ['event'=>$event, 'users'=>$users, 'isAdmin'=>$isAdmin]);
    }

    public function create()
    {
        return view('event_member');
    }

    public function join($id) {
        $member = new EventMembers();
        $member->event_id = $id;
        $member->user_id = Auth::id();
        $isadmin = User::where('id', Auth::id())->value('user_type_id');
        if ($isadmin == 2){
            $member->member_type_id = 3; // admin
        }
        else{
            $member->member_type_id = 1; // member
        }
        $member->save();
        return redirect('/event/'.$id);
    }

    public function leave($id) {
        $member = EventMembers::where('event_id', $id)->where('user_id', Auth::id());
        $member->delete();
        return redirect('/profile');
    }

    public function setParticipant($eventID, $userID) {
        if(EventMembers::where('event_id', $eventID)->where('user_id', Auth::id())->first()->member_type_id != 3) {
            return redirect('/profile');
        }
        $member = EventMembers::where('event_id', $eventID)->where('user_id', $userID);
        $member->update(['member_type_id' => 1]);
        return redirect('/event/'.$eventID);
    }

    public function setManager($eventID, $userID) {
        $member = EventMembers::where('event_id', $eventID)->where('user_id', $userID);
        $member->update(['member_type_id' => 2]);
        return redirect('/event/'.$eventID);
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

        return view('event_members')->with($members);
    }


    // Not sure you can edit an event member
    public function edit(EventMembers $EventMembers)
    {
        return view('event_member');
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
