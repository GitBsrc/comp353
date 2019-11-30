<?php

namespace App\Http\Controllers;

use App\GroupMembers;
use Illuminate\Http\Request;

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
        return View::make('groupMembers.index')
            ->with('groupMembers', $group_members);
    }

    /**
     * Show the form for creating a new group member.
     * 
     * @return Response
     */
    public function create(){
        return View::make('groupMembers.create');
    }

    /**
     * Store a newly created group member in storage.
     * 
     * @return Response
     */
    public function store(Request $request){
        
        // validate login

        // validate that user and group exist
        // and that person is leader?
        $this->validate($request, [
            // 'user' => 'required',
            'isLeader' => 'required'
        ]);

        // store group member
        $group_member = new GroupMembers();

        // $group_member->userID = ;
        // $group_member->groupID = ;
        $group_member->isLeader = $request->input('isLeader');
        // store end date?? need to generate it

        $group_member->save();
        Session::flash('message', 'Group member added!');
        return Redirect::to('groupMembers');
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
        return View::make('groupMembers.show')
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
        return View::make('groupMembers.edit')
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
        return Redirect::to('groupMembers');
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
        return Redirect::to('groupMembers');
    }
}
