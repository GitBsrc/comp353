@extends('layouts.app')

@section('content')
<div class="columns is-centered">
<div class="section column is-half">
    <div class="box">
    <div class="level">
        <a class="button level-left" href="/event">Back</a>
        <span class="level-item title is-bold">
            Edit Event 1
        </span>
    </div>

      <div class="field">
        <label class="label">Event Name</label>
        <div class="control">
          <input class="input" type="email" placeholder="e.g Coffee break">
        </div>
      </div>

      <div class="field">
            <label class="label">Event Description</label>
            <div class="control">
                <textarea class="textarea" placeholder="e.g. Describe your evemt here"></textarea>
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

        <div class="field">
                <label class="label">Event Location</label>
                <div class="control">
                  <input class="input" type="email" placeholder="e.g H609 Hall Building">
                </div>
        </div>
        <br />
        <p>
        <a class="button is-fullwidth" href="/event">Save</a>
        </p>




 </div>
</div>
</div>
@endsection
<script src="~bulma-calendar/dist/js/bulma-calendar.min.js">
// Initialize all input of type date
var calendars = bulmaCalendar.attach('[type="date"]', options);

// Loop on each calendar initialized
for(var i = 0; i < calendars.length; i++) {
	// Add listener to date:selected event
	calendars[i].on('select', date => {
		console.log(date);
	});
}

// To access to bulmaCalendar instance of an element
var element = document.querySelector('#my-element');
if (element) {
	// bulmaCalendar instance is available as element.bulmaCalendar
	element.bulmaCalendar.on('select', function(datepicker) {
		console.log(datepicker.data.value());
	});
}
</script>
