<?php

namespace App\Http\Controllers;

use App\_Event_;
use Illuminate\Http\Request;
use App\Providers\Generator;

class EventController extends Controller
{
    public function index()
    {
        return view('event_list');
    }

    public function create()
    {
        return View::make('edit_event');
    }

    // Only system administrator user type can call this function
    public function store(Request $request)
    {
        $generator = new Generator();

        $this->validate($request, ['name' => 'required', 'description' => 'required|max:450', 'startDate' => 'required', 'endDate' => 'required|after:startDate', 'type' => 'required', 'location' => 'required']);

        $event = new _Event_();
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->startDate = $request->input('startDate');
        $event->endDate = $request->input('endDate');
        // Assume for now 2 types of events: profit and non-profit through dropdown
        $event->type = $request->input('type');
        $event->location = $request->input('location');
        // First time occurring
        $event->recurrence = 0;
        // No discount initially
        $event->discount = 0;
        // Preset bandwidth and storage for all events and can be changed after creation of event
        $event->bandwidth = 86.92;
        $event->storage = 50;
        $event->status = $generator->generate_status($request->input('startDate'),$request->input('endDate'));
        // should get price rate from administrator type user set value
        $event->price = $generator->generate_price($request->input('type'), 25);

        $event->save();

        return redirect('event')->with('event', $event);
    }

    public function show($id)
    {
        // Re-generate event status and price and what about storage and bandwidth??
        $event = _Event_::find($id);

        return View::make('event')->with('event', $event);
    }

    public function edit($id)
    {
        $event = _Event_::find($id);

        return View::make('edit_event')->with('event', $event);
    }

    // Only manager type user can call this function
    // Cannot update type to avoid bypassing additional charges
    // Not sure about verify null unless we get current values in front end then re-post them
    public function update(Request $request,  _Event_ $event)
    {
        $generator = new Generator();

        $this->validate($request, ['name' => 'nullable', 'description' => 'nullable|max:450', 'location' => 'nullable', 'startDate' => 'nullable', 'endDate' => 'nullable|after:startDate']);

        $event->name = $generator->verify_null($request->input('name'), $event->name);
        $event->description = $generator->verify_null($request->input('description'), $event->description);
        $event->location = $generator->verify_null($request->input('location'), $event->location);
        $event->startDate = $generator->verify_null($request->input('startDate'), $event->startDate);
        $event->endDate = $generator->verify_null($request->input('endDate'), $event->endDate);
        $current_end_date = $event->endDate;

        // Add 15$ additional charge if date was extended during event update

        if($generator->date_is_greater($generator->verify_null($request->input('endDate'), $event->endDate), $current_end_date)){
            $event->price += 15;
        };

        $event->save();

        return redirect('event')->with('event', $event);
    }

    // Does not clearly state but assume this function should be called by manager user type
    public function repeat(Request $request, _Event_ $event)
    {
        $generator = new Generator();

        $this->validate($request, ['name' => 'required', 'description' => 'required|max:450', 'location' => 'required', 'startDate' => 'required', 'endDate' => 'required|after:startDate']);

        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->location = $request->input('location');
        $event->startDate = $request->input('startDate');
        $event->endDate = $request->input('endDate');
        $event->recurence += 1;
        $event->discount = $generator->generate_discount($event->recurrence, $event->discount);
        // should get price rate from administrator type user set value
        $event_price_no_discount = $generator->generate_price($request->input('type'), 25);
        $event->price = $generator->apply_discount($event_price_no_discount, $event->discount);

        $event->save();

        return redirect('event')->with('event', $event);;
    }

    public function destroy(_Event_ $_Event_)
    {
        //not needed? or change to something that changes status
    }


}

