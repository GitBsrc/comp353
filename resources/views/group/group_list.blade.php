@extends('layouts.app')

@section('content')
<div class="columns is-centered">
<div class="section column is-half">
    <nav class="panel">
        <a class="level-item panel-heading">
          Groups
        </a>
        <div class="panel-block">
          <p class="control has-icons-left">
            <input class="input" type="text" placeholder="Search Groups">
            <span class="icon is-left">
              <i class="fas fa-search" aria-hidden="true"></i>
            </span>
          </p>
           @if($isAdmin)
          <a class="button" href="{{ route('create_group')}}">+</a>
           @endif
        </div>
        <div class="panel-block">
          <div class="container">
                @foreach ($groups as $group)
                  <div class="panel-block">
                    <div class="container">
                        <form>
                        <div class="field">
                        <p class="is-pulled-left is-active">{{$group->groupName}}</p>
                        </div>
                        <div class="field">
                          @if(in_array($group->id, $joinedGroups))
                            <a href="" class="button is-pulled-right is-small">Leave</a>
                          @else
                            <a href="" class="button is-pulled-right is-small">Join</a>
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

