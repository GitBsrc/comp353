@extends('layouts.app')

@section('content')

    <div class="columns is-centered">
        <div class="section column is-half">
            <div class="box">
                <form method="post" action="/repeat_event/{{$event->id}}">
                    @csrf
                    <div class="level">
                        <a class="button level-left" href="/edit_event/{{$event->id}}">Back</a>
                        <span class="level-item title is-bold">
                            Repeat {{$event->name}}
                        </span></div>

                    <div class="field">
                        <label class="label">New Start Date</label>
                        <div class="control">
                            <input class="input" name="startDate" type="date">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Start Time</label>
                        <div class="control">
                            <input class="input" type="time" name="startTime">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">New End Date</label>
                        <div class="control">
                        <input class="input" name="endDate" type="date">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">End Time</label>
                        <div class="control">
                            <input class="input" type="time" name="endTime">
                        </div>
                    </div>

                <br />
                    <p>Warning: Repeating an event comes at an additional charge</p>
                        <p><button class="button is-fullwidth" type="submit">Repeat</button></p>
                </form>
            </div>
        </div>
    </div>


@endsection

