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
        return view('event_list');
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
        $this->validate($request, ['name' => 'required', 'description|max:450' => 'required', 'startDate' => 'required', 'endDate' => 'required|after:startDate', 'type' => 'required', 'location' => 'required']); 

        $event = new _Event_();

        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->startDate = $request->input('startDate');
        $event->endDate = $request->input('endDate');
        $event->status = $this->generate_status($request->input('startDate'),$request->input('endDate'));
        $event->type = $request->input('type');
        $event->discount = 0;
        $event->location = $request->iput('location'); 
        $event->price = $this->generate_price($request->input('type'));
        $event->recurrence = 0;

        $event->save();

        return redirect('event')->with('event', $event);
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
        
        $this->validate($request, ['name' => 'required', 'description|max:450' => 'required', 'startDate' => 'required', 'endDate' => 'required|after:startDate', 'location' => 'required']); 
        # Not resaving discount nor recurrence because they are not affected from content
        # Not allowing type update (for now at least)
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->startDate = $request->input('startDate');
        $event->endDate = $request->input('endDate');
        $event->status = $this->generate_status($request->input('startDate'),$request->input('endDate'));
        $event->location = $request->iput('location'); 

        $event->save();
        
        return redirect('event')->with('event', $event);;
    }

    public function repeat(Request $request, _Event_ $event)
    {
        
        $this->validate($request, ['startDate' => 'required', 'endDate' => 'required|after:startDate', 'location' => 'required']); 

        $event->startDate = $request->input('startDate');
        $event->endDate = $request->input('endDate');
        $event->status = $this->generate_status($request->input('startDate'),$request->input('endDate'));
        $event->location = $request->input('location'); 
        $event->recurrence = $event->recurrence + 1;
        $event->discount = $this->generate_discount($event->recurrence, $event->discount);
        $event->price = $this->apply_discount($event->price, $event->discount);

        $event->save();
        
        return redirect('event')->with('event', $event);;
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

    public function generate_status($startDate, $endDate){
        if( (strtotime('now') < strtotime($startDate)) & (strtotime('now') < strtotime($endDate)) ){
            return 'upcoming';
        }
        else if( (strtotime('now') > strtotime($startDate)) & (strtotime('now') < strtotime($endDate)) ){
            return 'in progress';
        }
        else if ( (strtotime('now') > strtotime($startDate)) & (strtotime('now') > strtotime($endDate)) ){
            return 'archived';
        }
    }

    public function generate_price($event_type){
        switch ($event_type){
            case 'non-profit': 
                return 0;
            case 'family':
                return 0;
            case 'community':
                return 0;
            case 'business':
                return 35;
            case 'other':
                return 25;
        }
    }

    public function apply_discount($base_price, $price_discount){
        return (($base_price)-($base_price*($price_discount/100)));
    }

    public function generate_discount($repeated_events, $current_discount){
        if ($repeated_events % 3 == 1){
            $current_discount += 4;
            return $current_discount;
        }
        else{
            return $current_discount;
        }
    }

    ##TODO: add function that deletes events that have been archived for 7 weeks plus

}

