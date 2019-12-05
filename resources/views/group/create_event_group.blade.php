@extends('layouts.app')

@section('content')
<div class="columns is-centered">
<div class="section column is-half">
    <div class="box">
      <form method="post" action="/new_event_group/{{$eventID}}">
        @csrf
    <div class="level">
        <a class="button level-left" href="/event">Back</a>
        <span class="level-item title is-bold">
            Creating New Group
        </span>
    </div>

      <div class="field">
        <label class="label">Group Name</label>
        <div class="control">
          <input class="input" type="text" 
                placeholder="e.g Coffee break"
                name="name">
        </div>
      </div>

      <div class="field">
            <label class="label">Group Description</label>
            <div class="control">
                <textarea class="textarea" 
                    placeholder="e.g. Describe your group here" name="description"></textarea>
            </div>
        </div>


        <div class="field">
                <label class="label">Make Group Public</label>
                <div class="control">
                  <input style="width:15px; height:15px;" type="checkbox" name="isPublic[]">
                </div>
        </div>
        <br />
        <p>
          <button class="button is-fullwidth" type="submit">Save</button>
        </p>
      </form>
 </div>
</div>
</div>
@endsection