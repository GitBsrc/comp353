<?php

namespace App\Http\Controllers;

use App\EventRates;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventRateController extends Controller
{
    public function get_rates(){
        $id = 1;
        $event_rates = EventRates::find($id);

        return view('event.edit_rates', ['event_rates'=>$event_rates]);
    }
}
