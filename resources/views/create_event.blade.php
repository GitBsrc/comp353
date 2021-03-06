@extends('layouts.app')

@section('content')
<form method="post" action="/new_event">
    @csrf
    <div class="columns is-centered">
        <div class="section column is-half">
            <div class="box">
                <div class="level">
                    <a class="button level-left" href="/event_list">Back</a>
                    <span class="level-item title is-bold">
                        Create Event
                    </span>
                </div>

                <div class="field">
                    <label class="label">Event Name</label>
                    <div class="control">
                        <input class="input" name="name" placeholder="e.g Enter event name">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Event Description</label>
                    <div class="control">
                        <textarea class="textarea" name="description" placeholder="e.g. Describe your event here"></textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Event Type</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="type">
                                <option>Select type</option>
                                <option value="Profit">Profit</option>
                                <option value="Non-profit">Non-profit</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Start Date</label>
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
                    <label class="label">End Date</label>
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

                <div class="field">
                    <label class="label">Event Location</label>
                    <div class="control">
                        <input class="input" name="location" placeholder="e.g H609 Hall Building">
                    </div>
                </div>
                <br />
                <p>
                    <button class="button is-fullwidth" type="submit">Create</button>
                </p>

            </div>
        </div>
    </div>
</form>
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
