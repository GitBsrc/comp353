@extends('layouts.app')

@section('content')

<div class="columns is-centered">
<div class="section column is-half">
    <div class="box">
        <form method="post" action="/update_event/{{$event->id}}">
            @csrf
    <div class="level">
        <a class="button level-left" href="/event/{{$event->id}}">Back</a>
        <span class="level-item title is-bold">
            Edit {{$event->name}}
        </span>
    </div>

      <div class="field">
        <label class="label">Event Name</label>
        <div class="control">
          <input class="input" name="name"  value="{{$event->name}}">
        </div>
      </div>

      <div class="field">
            <label class="label">Event Description</label>
            <div class="control">
                <textarea class="textarea" name="description">{{$event->description}}</textarea>
            </div>
        </div>

        <div class="field">
            <label class="label">Event Location</label>
            <div class="control">
                <input class="input" name="location" value="{{$event->location}}">
            </div>
        </div>

        @if($event->status != 'Archived')
        <div class="field">
                <label class="label">Extend End Date</label>
                Current: {{$event->endDate}} (Additional charge of {{$event_rate->event_extension}} $)
                <div class="control">
                    <input class="input" name="endDate" type="date">
                </div>
        </div>
        @endif

        <div class="field">
                <label class="label">Add Bandwidth</label>
                (Additional charge of {{$event_rate->bandwidth}} $ / Mbps)
                <div class="control">
                    <input class="input" min="{{$event->bandwidth}}" type="number" step="0.01" name="bandwidth"  value="{{$event->bandwidth}}">
                </div>
        </div>


        <div class="field">
                <label class="label">Add storage</label>
            Additional charge of {{$event_rate->storage}} $ / GB)
                <div class="control">
                    <input class="input" min="{{$event->storage}}" type="number" step="0.01" name="storage"  value="{{$event->storage}}">
                </div>
        </div>

        <br />
        <p>
        <button class="button is-fullwidth" type="submit">Save</button>
        </p>
        <br />






        </form>
        <form method="post" action="/delete_event/{{$event->id}}">
            @csrf
            <p><button class="button is-fullwidth is-danger" type="submit">Delete</button></p>
        </form>
        <br />

        @if($event->status == 'Archived')
            <p><a class="button is-fullwidth" href="/repeat/{{$event->id}}">Repeat</a></p>
        @endif
 </div>
</div>
</div>


@endsection

