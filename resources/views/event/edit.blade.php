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

        <div class="field">
                <label class="label">Extend End Date</label>
                Current: {{$event->endDate}} (Warning: this comes at an additional charge)
                <div class="control">
                    <input class="input" name="endDate" type="date">
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
        <form method="post" action="/repeat_event/{{$event->id}}">
            @csrf
            @if($event->status == 'Archived')
            <p><button class="button is-fullwidth" type="submit">Repeat</button></p>
            @endif
        </form>
 </div>
</div>
</div>


@endsection

