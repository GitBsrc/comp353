<?php

namespace App\Http\Controllers;

use App\GroupMembers;
use App\Group;
use App\User;
use Illuminate\Http\Request;
use App\Providers\Generator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        // if(GroupMembers::where('groupID', $groupID)->where('userID', Auth::id())->where('isLeader', 1) === null){
        //     return redirect('/profile');
        // }

        $users = User::all();

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
                'group' => $group,
                'users' => $users
            ]);
        }

        return redirect('/profile');
    }

    public function deleteMember($groupID, $userID){

        $membership = GroupMembers::where('groupID', $groupID)->where('userID', $userID)->first();
        $membership->delete();

        return redirect('/group/'.$groupID);
    }
    public function makeLeader($groupID, $userID){
        $membership = GroupMembers::where('groupID', $groupID)->where('userID', $userID)->first();
        $membership->isLeader = 1;

        return redirect('/group/'.$groupID);
    }

    /**
     * Store a newly created group member in storage.
     *
     * @return Response
     */
    public function store(Request $request, $id){
        // validate that user and group exist
        // and that person is leader?
        $this->validate($request, [
            'id' => 'required'
        ]);

        // store group member
        $group_member = new GroupMembers();

        $group_member->userID = $request->input('id');
        $group_member->groupID = $id;
        $group_member->joinDate = Carbon::now();

        if($request->has('isLeader')) {
            $group_member->isLeader = 1;
        }
        else {
            $group_member->isLeader = 0;
        }


        $group_member->save();

        return redirect('/group/'.$id);
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
