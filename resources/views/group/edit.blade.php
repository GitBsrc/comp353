@extends('layouts.app')

@section('content')
<div class="columns is-centered">
<div class="section column is-half">
    <div class="box">
    <div class="level">
        <a class="button level-left" href="/event">Back</a>
        <span class="level-item title is-bold">
            Editing "{{$group->groupName}}"
        </span>
    </div>

      <div class="field">
        <label class="label">Group Name</label>
        <div class="control">
          <input class="input" type="text" 
                placeholder="e.g Coffee break"
                value="{{$group->groupName}}">
        </div>
      </div>

      <div class="field">
            <label class="label">Group Description</label>
            <div class="control">
                <textarea class="textarea" 
                    placeholder="e.g. Describe your group here">{{$group->groupDescription}}</textarea>
            </div>
        </div>


        <div class="field">
                <label class="label">Make Group Public</label>
                <div class="control">
                  <input style="width:15px; height:15px;" type="checkbox" value="{{$group->groupIsPublic}}">
                </div>
        </div>
        <br />
        <p>
        <a class="button is-fullwidth" href="/group">Save</a>
        </p>

 </div>
</div>
</div>
@endsection