@extends('layouts.app')

@section('content')
    <div class="columns is-centered">
        <div class="section column is-half">
            <div class="box">
                <div class="level">
                <a class="button level-left" href="/event/{{$event->id}}">Back</a>
                        <span class="level-item title is-bold">
                        Event Members
                         </span>
                </div>
                <div class="panel-block">
                    <p class="control has-icons-left">
                        <input class="input" type="text" placeholder="Search Members">
                        <span class="icon is-left">
              <i class="fas fa-search" aria-hidden="true"></i>
            </span>
                    </p>
                </div>
                @foreach($users as $user)
                <div class="panel-block">
                    <div class="container">
                        <div class="field">
                        <a class="is-pulled-left is-active" href="/profile/{{$user['name']->id}}">{{$user['name']->name}}</a>
                            @if($isAdmin)
                                @if($user['memberType'] == 'participant')
                                <a href="/set_manager/{{$event->id}}/{{$user['name']->id}}" class="is-pulled-right button is-small">Change to Manager</a>
                                @elseif($user['memberType'] == 'manager')
                                <a href="/set_participant/{{$event->id}}/{{$user['name']->id}}" class="is-pulled-right button is-small">Change to Participant</a>
                                @elseif($user['memberType'] == 'administrator')
                                    <a class="is-pulled-right button is-small">Administrator</a>
                                @else
                                <p class="is-pulled-right is-active">{{$user['memberType']}}</p>
                                @endif
                            @else
                            <p class="is-pulled-right is-active">{{$user['memberType']}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </nav>
        </div>
    </div>
@endsection

