<?php

namespace App\Http\Controllers;

use App\EventRates;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Providers\Generator;

class EventRateController extends Controller
{
    public function get_rates(){
        $id = 1;
        $event_rates = EventRates::find($id);

        return view('event.edit_rates', ['event_rates'=>$event_rates]);
    }

    public function update_rates(Request $request){

        $generator = new Generator();
        $this->validate($request, ['event' => 'nullable', 'bandwidth' => 'nullable', 'storage' => 'nullable', 'extension' => 'nullable', 'recurrence' => 'nullable', 'discount' => 'nullable', ]);

        $id = 1;
        $event_rates = EventRates::find($id);

        $event_rates->event = $generator->verify_null($request->input('event'), $event_rates->event);
        $event_rates->bandwidth = $generator->verify_null($request->input('bandwidth'), $event_rates->bandwidth);
        $event_rates->storage = $generator->verify_null($request->input('storage'), $event_rates->storage);
        $event_rates->event_extension = $generator->verify_null($request->input('extension'), $event_rates->event_extension);
        $event_rates->event_recurrence = $generator->verify_null($request->input('recurrence'), $event_rates->event_recurrence);
        $event_rates->event_recurrence_discount = $generator->verify_null($request->input('discount'), $event_rates->event_recurrence_discount);

        $event_rates->update();

        return view('event.edit_rates', ['event_rates'=>$event_rates]);

    }
}
