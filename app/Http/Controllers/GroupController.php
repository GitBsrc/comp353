<?php

namespace App\Http\Controllers;

use App\Group;
use App\Posts;
use App\Event;
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
        $user = Auth::user();
        return view('group', ['user'=>$user]);
    }

    /**
     * Display unique group page.
     */
    public function get($id){
        $group = Group::findOrFail($id);
        $posts = Posts::where('groupID', $id)->get();
        // update this once events have group id
        // $events = Event::where('groupID', $id)->get();
        $memberships = GroupMembers::where('groupID', $id)->get();
        $admin_user = 0;
        $group_members = array();
        foreach($memberships as $member){
            $userID = $member->userID;
            $user = User::where('id', $userID)->first();
            array_push($group_members, $user);
            if($userID == Auth::user()->id){
                $admin_user = $member->isLeader;
            }
        }

        // determine whether viewing user is administrator

        $post_count = 0;
        foreach($posts as $post){
            $post_count = $post_count + 1;
        }
        $event_count = 0;
        // foreach($events as $event){
        //     $event_count = $event_count + 1;
        // }
        $member_count = 0;
        foreach($group_members as $member){
            $member_count = $member_count + 1;
        }

        return view('group.profile', [
            'group' => $group,
            'posts' => $posts,
            // 'events' => $events,
            'group_members' => $group_members,
            'post_count' => $post_count,
            'event_count' => $event_count,
            'member_count' => $member_count,
            'admin_user' => $admin_user
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

    /**
     * Remove the specified group from storage.
     * 
     * @param int $groupID
     * @return Response
     */
    public function destroy($groupID){
        // find group
        $group = Group::find($groupID);
        $group->delete();

        return redirect('profile');
    }
}
