@extends('layouts.app')

@section('content')
<div class="columns is-centered">
  <div class="section column is-half">
    <div class="box">
      <form method="post" action="/update_group/{{$group->id}}">
        @csrf
        <div class="level">
            <a class="button level-left" href="/group/{{$group->id}}">Back</a>
            <span class="level-item title is-bold">
                Editing "{{$group->groupName}}"
            </span>
        </div>

        <div class="field">
          <label class="label">Group Name</label>
          <div class="control">
            <input class="input" type="text" 
                  placeholder="e.g Coffee break"
                  value="{{$group->groupName}}"
                  name="name">
          </div>
        </div>

        <div class="field">
            <label class="label">Group Description</label>
            <div class="control">
                <textarea class="textarea" 
                    placeholder="e.g. Describe your group here"
                    name="description">{{$group->groupDescription}}</textarea>
            </div>
        </div>


        <div class="field">
          <label class="label">Make Group Public</label>
          <div class="control">
            <input style="width:15px; height:15px;" type="checkbox" value="{{$group->groupIsPublic}}" name="isPublic[]"
            @if($group->groupIsPublic == 1)
              checked
            @endif>
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