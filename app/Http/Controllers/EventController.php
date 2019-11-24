<?php

namespace App\Http\Controllers;

use App\_Event_;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view for all events (or viewable events)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('edit_event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'description' => 'required', 'startDate' => 'required', 'endDate' => 'required', 'type' => 'required']); 

        $event = new _Event_();

        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->startDate = $request->input('startDate');
        $event->endDate = $request->input('endDate');
        // $event->status = $request->input('status'); Needs some default value
        $event->type = $request->input('type');
        // $event->discount = $request->input('discount'); From somewhere?
        // $event->price = $request->input('price'); From some function

        $event->save();

        // return redirect("SOMEWHERE")
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\_Event_  $_Event_
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = _Event_::find($id);

        return View::make('event')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\_Event_  $_Event_
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = _Event_::find($id);

        return View::make('edit_event')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\_Event_  $_Event_
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, _Event_ $event)
    {
        
        $this->validate($request, ['name' => 'required', 'description' => 'required', 'startDate' => 'required', 'endDate' => 'required', 'type' => 'required']); 

        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->startDate = $request->input('startDate');
        $event->endDate = $request->input('endDate');
        // $event->status = $request->input('status'); Needs some default value
        $event->type = $request->input('type');
        // $event->discount = $request->input('discount'); From somewhere?
        // $event->price = $request->input('price'); From some function

        $event->save();

        // return redirect("SOMEWHERE")
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\_Event_  $_Event_
     * @return \Illuminate\Http\Response
     */
    public function destroy(_Event_ $_Event_)
    {
        //not needed? or change to something that changes status
    }
}
