@extends('layouts.app')

@section('content')
<form method="post" action="/update_event/{{$event->id}}">
@csrf
<div class="columns is-centered">
<div class="section column is-half">
    <div class="box">
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

 </div>
</div>
</div>
</form>
@endsection

