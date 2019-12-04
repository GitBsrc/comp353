<?php

namespace App\Http\Controllers;

use App\Group;
use App\Posts;
use App\Event;
use App\GroupMembers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\Generator;

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
            'groupName' => 'required', 
            'groupDescription' => 'required|max:1000', 
            'groupIsPublic' => 'required'
        ]);

        // store group
        $group = new Group();

        $group->groupName = $request->input('groupName');
        $group->groupDescription = $request->input('groupDescription');
        $group->groupIsPublic = $request->input('groupIsPublic');

        $group->recurrence = 0;

        $group->save();
        return redirect('group.profile')->with('group', $group);
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
    public function update(Request $request, Group $group){
        // validate login

        // validate input
        $this->validate($request, [
            'groupName' => 'required', 
            'groupDescription' => 'required|max:1000', 
            'groupIsPublic' => 'required'
        ]);

        $group->groupName = $request->input('groupName');
        $group->groupDescription = $request->input('groupDescription');
        $group->groupIsPublic = $request->input('groupIsPublic');

        $group->save();
        Session::flash('message', 'Group updated!');
        return redirect('group.profile', ['group'=>$group]);
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

        Session:flash('message', 'Group deleted.');
        return redirect('/home');
    }
}
