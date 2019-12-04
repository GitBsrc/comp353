<?php

namespace App\Http\Controllers;

use App\GroupMembers;
use App\Group;
use App\User;
use Illuminate\Http\Request;
use App\Providers\Generator;
use Illuminate\Support\Facades\Auth;

class GroupMembersController extends Controller
{
    /**
     * Display a listing of the group members.
     * 
     * @return Response
     */
    public function index(){
        // get all memebrs
        $group_members = GroupMembers::all();

        // display members
        return view('groupMembers.index')
            ->with('groupMembers', $group_members);
    }

    /**
     * Show the form for adding a new group member.
     * 
     * @return Response
     */
    public function addMemberForm($groupID){
        // should only be able to add if user is leader
        $group = Group::where('id', $groupID)->first();
        $memberships = GroupMembers::where('groupID', $groupID)->get();
        $admin_user = 0;
        $group_members = array();
        foreach($memberships as $member){
            $userID = $member->userID;
            $user = User::where('id', $userID)->first();
            array_push($group_members, $user);
            if($userID == Auth::user()->id){
                $admin_user = $member->isLeader;
                break;
            }
        }
        if($admin_user == 1){
            // show edit view
            return view('group.add_group_members', [
                'group_members' => $group_members,
                'group' => $group
            ]);
        }

        // update this
        return view('welcome');
    }
    public function deleteMemberForm($groupID){
        // should only be able to delete if user is leader
        $group = Group::where('id', $groupID)->first();
        $memberships = GroupMembers::where('groupID', $groupID)->get();
        $admin_user = 0;
        $group_members = array();
        foreach($memberships as $member){
            $userID = $member->userID;
            $user = User::where('id', $userID)->first();
            array_push($group_members, $user);
            if($userID == Auth::user()->id){
                $admin_user = $member->isLeader;
                break;
            }
        }
        if($admin_user == 1){
            // show edit view
            return view('group.delete_group_members', [
                'group_members' => $group_members,
                'group' => $group
            ]);
        }

        // update this
        return view('welcome');
    }

    /**
     * Store a newly created group member in storage.
     * 
     * @return Response
     */
    public function store(Request $request){
        // validate that user and group exist
        // and that person is leader?
        $this->validate($request, [
            'userEmail' => 'required',
            'isLeader' => 'required'
        ]);

        // store group member
        $group_member = new GroupMembers();
        $userID = User::where('email', 'userEmail')->first()->userID;
        $groupID = Group::where('groupID', '')->get()->groupID;

        $group_member->userID = $userID;
        $group_member->groupID = $groupID;
        $group_member->isLeader = $request->input('isLeader');

        $group_member->save();
        Session::flash('message', 'Group member added!');
        return redirect('groupMembers');
    }

    /**
     * Display the specified group members.
     * 
     * @param int $id
     * @return Response
     */
    public function show($id){
        // get members (either group or user ID should work)
        $group_members = GroupMembers::find($id);

        // show members
        return view('groupMembers.show')
            ->with('groupMembers', $group_members);
    }

    /**
     * Show the form for editing the specified group member.
     * 
     * @param int $id
     * @return Response
     */
    public function edit($id){
        // should only be able to edit if user is leader
        $group_member = GroupMembers::find($id);

        // show edit view
        return view('groupMembers.edit')
            ->with('groupMembers', $group_member);
    }

    /**
     * Update the specified group member in storage.
     * 
     * @param int $userID
     * @return Response
     */
    public function update($userID){
        // validate login

        // validate necessary input
        $this->validate($request, [
            // 'user' => 'required',
            'isLeader' => 'required'
        ]);

        // store group member
        $group_member = GroupMembers::find($userID);

        // $group_member->userID = ;
        // $group_member->groupID = ;
        $group_member->isLeader = $request->input('isLeader');
        // store end date?? need to generate it

        $group_member->save();
        Session::flash('message', 'Group member updated!');
        return redirect('groupMembers');
    }

    /**
     * Remove the specified group member from storage.
     * 
     * @param int $id
     * @return Response
     */
    public function destroy($id){
        // find group member
        $group_member = GroupMembers::find($id);
        $group_member = GroupMembers::find($id);
        $group->delete();

        Session:flash('message', 'Group member deleted.');
        return redirect('groupMembers');
    }
}
