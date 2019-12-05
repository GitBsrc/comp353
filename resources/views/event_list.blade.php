@extends('layouts.app')

@section('content')
<div class="columns is-centered">
<div class="section column is-half">
    <nav class="panel">
        <a class="level-item panel-heading">
          Events
        </a>
        <div class="panel-block">
          <p class="control has-icons-left">
            <input class="input" type="text" placeholder="Search Event">
            <span class="icon is-left">
              <i class="fas fa-search" aria-hidden="true"></i>
            </span>
          </p>
           @if($isAdmin)
          <a class="button" href="create_event">+</a>
           @endif
        </div>
        <div class="panel-block">
          <div class="container">
                @foreach ($events as $event)
                  <div class="panel-block">
                    <div class="container">
                      <form>
                        <div class="field">
                        <a class="is-pulled-left is-active" href="/event/{{$event->id}}">{{$event->name}}</a>
                        </div>
                        <div class="field">
                          @if(in_array($event->id, $joinedEvents))
                            <a href="/leave_event/{{$event->id}}" class="button is-pulled-right is-small">Leave</a>
                          @else
                            <a href="/join_event/{{$event->id}}" class="button is-pulled-right is-small">Join</a>
                          @endif
                        </div>
                      </form>
                    </div>
                  </div>
                @endforeach
          </div>
        </div>
      </nav>
</div>
</div>
@endsection

