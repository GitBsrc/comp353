@extends('layouts.app')

@section('content')

    <div class="columns is-centered">
        <div class="section column is-half">
            <div class="box">
                <form method="post" action="/update_rates">
                    @csrf
                    <div class="level">
                        <a class="button level-left" href="/event_list">Back</a>
                        <span class="level-item title is-bold">
                         Edit System Rates
                        </span>
                    </div>

                    <div class="field">
                        <label class="label">Base Event Price</label>
                        <div class="control">
                            <input class="input" type="number" step="0.01" name="event"  value="{{$event_rates->event}}">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Extra bandwidth rate /Mbps</label>
                        <div class="control">
                            <input class="input" type="number" step="0.01" name="bandwidth" value="{{$event_rates->bandwidth}}">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Extra storage rate /GB</label>
                        <div class="control">
                            <input class="input" type="number" step="0.01" name="storage" value="{{$event_rates->storage}}">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Event extension rate</label>
                        <div class="control">
                            <input class="input" type="number" step="0.01" name="extension" value="{{$event_rates->event_extension}}">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Event recurrence rate</label>
                        <div class="control">
                            <input class="input" type="number" step="0.01" name="recurrence" value="{{$event_rates->event_recurrence}}">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Event recurrence discount %</label>
                        <div class="control">
                            <input class="input" type="number" step="0.01" name="discount" value="{{$event_rates->event_recurrence_discount}}">
                        </div>
                    </div>



                    <br />
                    <p>
                        <button class="button is-fullwidth" type="submit">Save</button>
                    </p>
                    <br />






                </form>
            </div>
        </div>
    </div>


@endsection

