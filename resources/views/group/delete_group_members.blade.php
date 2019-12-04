@extends('layouts.app')

@section('content')
    <div class="columns is-centered">
        <div class="section column is-half">
            <div class="box">
                <div class="level">
                    <a class="button level-left" href="/event_list">Back</a>
                    <span class="level-item title is-bold">
                        Members Manager - Deleting Members
                    </span>
                    <span>Group: {{$group->groupName}}</span>
                </div>

                <!-- update this: need a search bar that works -->
                
                @foreach($group_members as $member)
                <div class="panel-block">
                    <div class="container">
                        <form>
                            <div class="field">
                                <p class="is-pulled-left is-active">{{$member->name}} - {{$member->email}}</p>
                                <a align="right" style="background-color:red; color:white;" class="button is-pulled-right is-small" href="">Delete</a>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach

                <br />
                <p>
                    <!-- update this -->
                    <a class="button is-fullwidth" href="/group/{{$group->id}}">Save</a>
                </p>




            </div>
        </div>
    </div>
@endsection