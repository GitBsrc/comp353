@extends('layouts.app')

@section('content')
    <div class="columns is-centered">
        <div class="section column is-half">
            <div class="box">
                <div class="level">
                    <a class="button level-left" href="/event_list">Back</a>
                    <span class="level-item title is-bold">
                        Members Manager - Adding member
                    </span>
                    <span>Group: {{$group->groupName}}</span>
                </div>

                <div class="field">
                    <label class="label">ID</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="e.g Coffee break">
                    </div>
                </div>

                <div class="field">
                    <label class="label">First Name</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="e.g Eve">
                    </div>
                </div>

                <div class="field">
                    <label class="label">E-mail</label>
                    <div class="control">
                        <input class="input" type="email" placeholder="e.g eb@email.com">
                    </div>
                </div>

                <!-- update this -->
                <div class="field">
                    <label class="label">Date of Birth</label>
                    <div class="control">
                        <input class="input" type="text">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Make User a Leader</label>
                    <div class="control">
                        <input type="checkbox" placeholder="e.g Coffee break">
                    </div>
                </div>

                <br />
                <p>
                    <!-- update this -->
                    <a class="button is-fullwidth" href="/group/{{$group->id}}">Save</a>
                </p>




            </div>
        </div>
    </div>
@endsection