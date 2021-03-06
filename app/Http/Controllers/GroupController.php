<?php

namespace App\Http\Controllers;

use App\Group;
use App\Posts;
use App\Event;
use App\EventMembers;
use App\GroupMembers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class GroupController extends Controller
{
    /**
     * Display a view for the group page.
     * 
     * @return Response
     */
    public function index(){
        // get all PUBLIC groups and private groups the user is already in
        $id = Auth::id();
        $groups = array();
        $allGroups = Group::all();
        foreach($allGroups as $group){
            if($group->groupIsPublic === 1){
                array_push($groups, $group);
            }
        }
        $user_memberships = GroupMembers::where('userID', $id)->get();
        foreach($user_memberships as $membership){
            $groupID = $membership->groupID;
            $group = Group::where('id', $groupID)->first();
            // add group to regular groups
            array_push($groups, $group);
        }
        $joinedGroups = GroupMembers::where('userID', Auth::id())->pluck('groupID')->all();

        $isAdmin = in_array(Auth::id(), User::where('user_type_id', 2)->pluck('id')->all());

        // load the view and pass the groups
        return view('group.group_list', [
            'groups' => $groups, 
            'joinedGroups' => $joinedGroups,
            'isAdmin' => $isAdmin
        ]);
    }

    /**
     * Display unique group page.
     */
    public function get($id){
        $group = Group::findOrFail($id);

        // POSTS
        $posts = Posts::where('groupID', $id)->get();
        $post_count = 0;
        foreach($posts as $post){
            $post_count = $post_count + 1;
        }

        // EVENTS
        $events = Event::where('groupID', $id)->get();
        $event_count = 0;
        $events_array = array();
        foreach($events as $event){
            $event_count = $event_count + 1;
            array_push($events_array, $event);
        }
        // add event that fathered this group
        if($group->eventID !== NULL){
            $father = Event::where('id', $group->eventID)->first();
            $event_count = $event_count + 1;
            array_push($events_array, $father);
        }

        // MEMBERS
        $memberships = GroupMembers::where('groupID', $id)->get();
        if($group->groupIsPublic == 0 && !in_array(Auth::id(), GroupMembers::where('groupID', $id)->pluck('userID')->all())){
            return redirect('/profile');
        }
        $member_count = 0;
        $group_members = array();
        foreach($memberships as $member){
            $userID = $member->userID;
            $user = User::where('id', $userID)->first();
            $member_count = $member_count + 1;
            array_push($group_members, $user);
        }

        // determine whether viewing user is administrator
        $isAdmin = in_array(Auth::id(), User::where('user_type_id', 2)->pluck('id')->all());
        $current_membership = GroupMembers::where('groupID', $id)->where('userID', Auth::id())->first();
        if($current_membership !== NULL) {
            if($current_membership->isLeader == 1 || $isAdmin){
                $isLeader = true;
            }
        } else {
            $isLeader = false;
        }
        // pass id for posts
        $id = Auth::id();

        return view('group.profile', [
            'group' => $group,
            'posts' => $posts,
            'events' => $events_array,
            'group_members' => $group_members,
            'post_count' => $post_count,
            'event_count' => $event_count,
            'member_count' => $member_count,
            'isLeader' => $isLeader,
            'isAdmin' => $isAdmin,
            'id' => $id
            ]);
    }

    /**
     * Show the form for creating a new group.
     * 
     * @return Response
     */
    public function create(){
        return view('group.create');
    }

    /**
     * Store a newly created group in storage.
     * 
     * @return Response
     */
    public function store(Request $request){

        // validate login not required. page redirects to login

        // validate input
        $this->validate($request, [
            'name' => 'required', 
            'description' => 'required|max:1000'
        ]);

        // store group
        $group = new Group();

        $group->groupName = $request->input('name');
        $group->groupDescription = $request->input('description');
        if($request->has('isPublic')) {
            $group->groupIsPublic = 1;
        }
        else {
            $group->groupIsPublic = 0;
        }

        $group->save();

        $group_member = new GroupMembers();
        $group_member->userID = Auth::id();
        $group_member->groupID = $group->id;
        $group_member->isLeader = 1;
        $group_member->joinDate = Carbon::now();
        
        $group_member->save();

        return redirect('group/'.$group->id);
    }

    /**
     * Show the form for editing the specified group.
     * 
     * @param int $groupID
     * @return Response
     */
    public function edit($groupID){
        // get group
        $group = Group::find($groupID);

        if(GroupMembers::where('groupID', $groupID)->where('userID', Auth::id())->first()->isLeader == 0) {
            return redirect('/profile');
        }

        // show edit view
        return view('group.edit')
            ->with('group', $group);
    }

    /**
     * Update the specified group in storage.
     * 
     * @param int $groupID
     * @return Response
     */
    public function update(Request $request, $id){        
        $group = Group::find($id);

        $group->groupName = $request->input('name');
        $group->groupDescription = $request->input('description');
        if($request->has('isPublic')) {
            $group->groupIsPublic = 1;
        }
        else {
            $group->groupIsPublic = 0;
        }

        $group->update();
        
        return redirect('group/'.$id);
    }

    public function destroy($groupID){
        if(GroupMembers::where('groupID', $groupID)->where('userID', Auth::id())->first()->isLeader == 0) {
            return redirect()->route('profile');
        }

        // delete group
        $group = Group::find($groupID);
        $group->delete();

        return redirect()->route('profile');
    }

    public function autoCreateEventGroup($eventID){
        $group = new Group();

        $group->groupName = $request->input('name');
        $group->groupDescription = $request->input('description');
        $group->eventID = $eventID;
        if($request->has('isPublic')) {
            $group->groupIsPublic = 1;
        }
        else {
            $group->groupIsPublic = 0;
        }

        $group->save();

        // find event so we can add members
        $event_members = EventMembers::where('event_id', $eventID)->get();

        // add all event members to the group
        foreach($event_members as $member){
            $group_member = new GroupMembers();
            $group_member->userID = $member->userID;
            $group_member->groupID = $group->id;
            $group_member->isLeader = 0;
            $group_member->joinDate = Carbon::now();
            
            $group_member->save();
        }

        return redirect('group/'.$group->id);
    }

    public function createEventGroup($eventID){
        return view('group.create_event_group', ['eventID' => $eventID]);
    }
    public function storeEventGroup(Request $request, $eventID){
        $group = new Group();

        $group->groupName = $request->input('name');
        $group->groupDescription = $request->input('description');
        $group->eventID = $eventID;
        if($request->has('isPublic')) {
            $group->groupIsPublic = 1;
        }
        else {
            $group->groupIsPublic = 0;
        }

        $group->save();

        // automatically make maker a member
        $group_member = new GroupMembers();
        $group_member->userID = Auth::id();
        $group_member->groupID = $group->id;
        $group_member->isLeader = 1;
        $group_member->joinDate = Carbon::now();
        
        $group_member->save();

        // add members individually to the group later, not in here
        return redirect('group/'.$group->id);
    }
}
