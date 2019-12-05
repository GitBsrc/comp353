<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventRates;
use App\EventMembers;
use App\User;
use App\Group;
use App\Posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Providers\Generator;



// TODO: Instantiate Generator once (wasn't working)
class EventController extends Controller
{


    public function index()
    {
        // get all the posts
        $events = Event::all();

        $joinedEvents = EventMembers::where('user_id', Auth::id())->pluck('event_id')->all();
        $isAdmin = in_array(Auth::id(), User::where('user_type_id', 2)->pluck('id')->all());

        // load the view and pass the posts
        return view('event_list', ['events'=>$events, 'joinedEvents'=>$joinedEvents, 'isAdmin'=>$isAdmin]);
    }

    public function create()
    {
        return View::make('event.edit');
    }

    // Only system administrator user type can call this function
    public function store(Request $request)
    {
        $generator = new Generator();

        $this->validate($request, ['name' => 'required', 'description' => 'required|max:450', 'startDate' => 'required', 'endDate' => 'required|after:startDate', 'type' => 'required', 'location' => 'required', 'startTime' => 'required', 'endTime' => 'required']);

        $event = new Event();
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->startDate = $generator->merge_date_time($request->input('startDate'), $request->input('startTime')) ;
        $event->endDate = $generator->merge_date_time($request->input('endDate'), $request->input('endTime'));
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
        $event->event_rates_id = 1;
        $event->status = $generator->generate_status($request->input('startDate'),$request->input('endDate'));
        // should get price rate from administrator type user set value
        $event_rate = EventRates::find(1);
        $base_price = $event_rate->event;
        $event->price = $generator->generate_price($request->input('type'), $base_price);

        $event->save();

        PaymentController::deposit($event->price);
        $isAdmin = in_array(Auth::id(), User::where('user_type_id', 2)->pluck('id')->all());
        return redirect('/event/'.$event->id);
    }

    public function show($id)
    {
        $generator = new Generator();
        // Re-generate event status and price and what about storage and bandwidth??
        $event = Event::find($id);
        // Making sure we do not show archived events by generating the status on the spot
        $event->status = $generator->generate_status($event->startDate, $event->endDate);
        if($event->status != "archived"){
            return view('event', ['event'=>$event]);
        }
        return null;
    }

    public function get($id)
    {
        $isManager = in_array(Auth::id(), EventMembers::where('event_id', $id)->where('member_type_id', 2)->pluck('user_id')->all());
        $isAdmin = in_array(Auth::id(), User::where('user_type_id', 2)->pluck('id')->all());

        $groups = Group::where('eventID', $id)->get();
        $posts = Posts::where('eventID', $id)->get();
        // event.profile same as event view, just kept both to see difference in code
        return view('event.profile', [
            'event' => Event::findOrFail($id),
            'isManager' => $isManager,
            'isAdmin' => $isAdmin,
            'groups' => $groups,
            'posts' => $posts,
            'id' => Auth::id(),
        ]);
    }

    public function get_details($id)
    {
        return view('event_details', ['event' => Event::findOrFail($id)]);
    }

    public function edit($id)
    {
        $event = Event::find($id);
        $event_rate = EventRates::find(1);

        return view('event.edit', ['event' => $event, 'event_rate' => $event_rate]);
    }

    // Only manager type user can call this function
    // Cannot update type to avoid bypassing additional charges
    // Not sure about verify null unless we get current values in front end then re-post them
    public function update(Request $request, $id)
    {
        $generator = new Generator();
        $event = Event::find($id);

        $this->validate($request, ['name' => 'nullable', 'description' => 'nullable|max:450', 'location' => 'nullable', 'endDate' => 'nullable', 'bandwidth' => 'nullable', 'storage' => 'nullable']);

        $event->name = $generator->verify_null($request->input('name'), $event->name);
        $event->description = $generator->verify_null($request->input('description'), $event->description);
        $event->location = $generator->verify_null($request->input('location'), $event->location);
        $end_time = $event->endTime;
        $current_end_date = $event->endDate;
        $event->endDate = $generator->merge_date_time($generator->verify_null($request->input('endDate'), $event->endDate), $end_time);

        $event->bandwidth = $generator->verify_null($request->input('bandwidth'), $event->bandwidth);
        $event->storage = $generator->verify_null($request->input('storage'), $event->storage);
        // Add 15$ additional charge if date was extended during event update
        $event_rate = EventRates::find(1);
        if($generator->date_is_greater($generator->verify_null($request->input('endDate'), $event->endDate), $current_end_date)){
            $current = $event->price;
            $base_extension = $event_rate->event_extension;
            $base_price = $current + $base_extension;
            $after_discount = $generator->apply_discount($base_price, $event_rate->event_recurrence_discount);
        }
        else{
            $after_discount = $generator->apply_discount($event->price, $event_rate->event_recurrence_discount);
        }
        $extra_charges = $generator->add_config_rates($request->input('storage'), $request->input('bandwidth'), $event_rate->storage, $event_rate->bandwidth);
        $event->price += $after_discount+$extra_charges;


        $event->update();
        PaymentController::deposit($event->price);
        $isManager = in_array(Auth::id(), EventMembers::where('event_id', $id)->where('member_type_id', 2)->pluck('user_id')->all());
        $isAdmin = in_array(Auth::id(), User::where('user_type_id', 2)->pluck('id')->all());

        return redirect('/event/'.$event->id);
    }

    // Does not clearly state but assume this function should be called by manager user type
    public function repeat($id, Request $request)
    {
        $generator = new Generator();

        $this->validate($request, ['startDate' => 'required', 'endDate' => 'required|after:startDate', 'startTime' => 'required', 'endTime' => 'required']);

        $event = Event::find($id);
        $recurrence = $event->recurrence;
        $recurrence++;
        $event->recurrence = $recurrence;
        $current = $event->price;
        $event_rate = EventRates::find(1);
        $base_recurrence = $event_rate->event_recurrence;
        $base_price = $current + $base_recurrence;
        if(($recurrence % 2) == 1){
            $event->price = $generator->apply_discount($base_price, $event_rate->event_recurrence_discount);
            $event->discount += $event_rate->event_recurrence_discount;
        }
        else{
            $event->price = $base_price;
        }
        $event->startDate = $generator->merge_date_time($request->input('startDate'), $request->input('startTime')) ;
        $event->endDate = $generator->merge_date_time($request->input('endDate'), $request->input('endTime'));
        $event->status = $generator->generate_status($request->input('startDate'),$request->input('endDate'));
        $event->update();
        PaymentController::deposit($event->price);
        $isManager = in_array(Auth::id(), EventMembers::where('event_id', $id)->where('member_type_id', 2)->pluck('user_id')->all());
        $isAdmin = in_array(Auth::id(), User::where('user_type_id', 2)->pluck('id')->all());

        return redirect('/event/'.$event->id);
    }

    public function get_repeat($id)
    {
        $event = Event::find($id);

        return view('event.repeat')->with('event', $event);
    }

    // Only administrator user type can call this function based on his set price rates for storage and bandwidth
    public function editEventconfig(Request $request, Event $event){

        $generator = new Generator();

        $this->validate($request, ['bandwidth' => 'required|min:86.92', 'storage' => 'required|min:50']);
        $event->bandwidth = $request->input('bandwidth');
        $event->storage = $request->input('storage');

        // Rates should be set by administrator
        $event->price += $generator->add_config_rates($request->input('storage'),$request->input('bandwidth'),2,3);

    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        $events = Event::all();
        return redirect()->route('event_list');
    }


}

