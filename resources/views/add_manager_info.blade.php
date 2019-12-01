@extends('layouts.app')

@section('content')
    <div class="columns is-centered">
        <div class="section column is-half">
            <div class="box">
                <div class="level">
                    <a class="button level-left" href="/event_list">Back</a>
                    <span class="level-item title is-bold">
            Event Manager
        </span>
                </div>

                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="email" placeholder="e.g Coffee break">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Address</label>
                    <div class="control">
                        <input class="input" type="email" placeholder="e.g Cote des neiges">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Phone Number</label>
                    <div class="control">
                        <textarea class="textarea" placeholder="e.g. Describe your event here"></textarea>
                    </div>
                </div>


                <div class="field">
                    <label class="label">Add Payment</label>
                    <div class="control">
                        <a class="button is-fullwidth" href="/event">Payment info</a>
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

