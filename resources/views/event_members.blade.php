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
                <div class="panel-block">
                    <div class="container">
                        @foreach($users as $user)
                        <div class="field">
                        <a class="is-pulled-left is-active" href="/profile/{{$user['name']->id}}">{{$user['name']->name}}</a>
                            <p class="is-pulled-right is-active">{{$user['memberType']}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </nav>
        </div>
    </div>
@endsection

