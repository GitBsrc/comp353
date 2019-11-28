<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a view for the group page.
     * 
     * @return Response
     */
    public function index(){
        return View::make('group');
    }

    /**
     * Show the form for creating a new group.
     * 
     * @return Response
     */
    public function create(){
        return View::make('group.create');
    }

    /**
     * Store a newly created group in storage.
     * 
     * @return Response
     */
    public function store(Request $request){

        // validate login

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
        Session::flash('message', 'New group created!');
        return Redirect::to('group');
    }

    /**
     * Display the specified group.
     * 
     * @param int $groupID
     * @return Response
     */
    public function show($groupID){
        // get the group
        $group = Group::find($groupID);

        // show group
        return View::make('group.show')
            ->with('group', $group);
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
        return View::make('group.edit')
            ->with('group', $group);
    }

    /**
     * Update the specified group in storage.
     * 
     * @param int $groupID
     * @return Response
     */
    public function update($groupID){
        // validate login

        // validate input
        $this->validate($request, [
            'groupName' => 'required', 
            'groupDescription' => 'required|max:1000', 
            'groupIsPublic' => 'required'
        ]);

        // store group
        $group = Group::find($groupID);

        $group->groupName = $request->input('groupName');
        $group->groupDescription = $request->input('groupDescription');
        $group->groupIsPublic = $request->input('groupIsPublic');

        $group->recurrence = 0;

        $group->save();
        Session::flash('message', 'Group updated!');
        return Redirect::to('group');
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
        return Redirect::to('/home');
    }
}
