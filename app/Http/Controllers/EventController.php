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
        $this->validate($request, ['name' => 'required', 'description' => 'required', 'startDate' => 'required', 'endDate' => 'required', 'type' => 'required']); 

        $event = new _Event_();

        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->startDate = $request->input('startDate');
        $event->endDate = $request->input('endDate');
        $event->status = $this->generate_status($request->input('startDate'),$request->input('endDate'));
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

    public function generate_status($startDate, $endDate){
        if( (strtotime('now') < strtotime($startDate)) & (strtotime('now') < strtotime($endDate)) ){
            return 'upcoming';
        }
        else if( (strtotime('now') > strtotime($startDate)) & (strtotime('now') < strtotime($endDate)) ){
            return 'in progress';
        }
        else if ( (strtotime('now') > strtotime($startDate)) & (strtotime('now') > strtotime($endDate)) ){
            return 'completed';
        }
    }

    public function generate_price($original_price, $discount_percentage){
        return (($original_price)-($original_price*($discount_percentage/100)));
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
}
