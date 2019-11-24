@extends('layouts.app')

@section('content')
<div class="section">
    
    <div class="level">
        <a class="button level-left" href="/event">Back</a>
        <span class="level-item title is-bold">
            Event 1
        </span>
    </div>
    <div class="field">
        <label class="label">Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="e.g Alex Smith">
        </div>
      </div>
      
      <div class="field">
        <label class="label">Address</label>
        <div class="control">
          <input class="input" type="email" placeholder="e.g Concordia University Hall Building">
        </div>
      </div>

      <div class="field">
        <label class="label">Phone</label>
        <div class="control">
          <input class="input" type="email" placeholder="e.g (XXX)-XXX XXXX">
        </div>
      </div>

      <div class="field">
        <label class="label">Event Type</label>
        <div class="control">
            <div class="select is-fullwidth">
              <select>
                <option>Select type</option>
                <option>Non-Profit</option>
                <option>Family</option>
                <option>Community</option>
                <option>Other</option>
              </select>
            </div>
          </div>
      </div>

      <div class="field">
        <label class="label">Event Name</label>
        <div class="control">
          <input class="input" type="email" placeholder="e.g Coffee break">
        </div>
      </div>

      <div class="field">
            <label class="label">Start Date</label>
            <div class="control">
                <input class="input" type="date">
            </div>
        </div>

        <div class="field">
                <label class="label">End Date</label>
                <div class="control">
                    <input class="input" type="date">
                </div>
        </div>



 </div>
@endsection
