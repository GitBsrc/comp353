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

        $this->validate($request, ['name' => 'required', 'description|max:450' => 'required', 'startDate' => 'required', 'endDate' => 'required|after:startDate', 'type' => 'required', 'location' => 'required']);

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
        // should get price rate from administrator type user
        $event->price = $generator->generate_price($request->input('type'), 25);

        $event->save();

        return redirect('event')->with('event', $event);
    }

    public function show($id)
    {
        $event = _Event_::find($id);

        return View::make('event')->with('event', $event);
    }

    public function edit($id)
    {
        $event = _Event_::find($id);

        return View::make('edit_event')->with('event', $event);
    }

    // Only manager type user can call this function
    // Cannot update startDate endDate and type to avoid bypassing additional charges
    public function update(Request $request,  _Event_ $event)
    {
        $generator = new Generator();

        $this->validate($request, ['name' => 'required', 'description|max:450' => 'required', 'location' => 'required', 'bandwidth|min:86.92' => 'required', 'storage|min:50' => 'required']);

        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->location = $request->input('location');
        $event->bandwidth = $request->input('bandwidth');
        $event->storage = $request->input('storage');
        // should get price rate from administrator type user
        $non_discount_price = $generator->generate_price($event->type, 25);
        $event->price = $generator->apply_discount($non_discount_price, $event->discount);

        $event->save();

        return redirect('event')->with('event', $event);
    }

    // It is not a requirement to edit any field of the system except the end date which is considered an extension
    // Only manager type user can call this function
    public function extend(Request $request, _Event_ $event)
    {
        $this->validate($request, ['endDate' => 'required|after:endDate']);

        $event->endDate = $request->input('endDate');
        $event->status = $this->generate_status($event->startDate, $request->input('endDate'));
        // Extension of events has an additional charge
        $event->price += 15;

        $event->save();

        return redirect('event')->with('event', $event);;
    }

    public function repeat(Request $request, _Event_ $event)
    {

        $this->validate($request, []);

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

    public function destroy(_Event_ $_Event_)
    {
        //not needed? or change to something that changes status
    }


}

