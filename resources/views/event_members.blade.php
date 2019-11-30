@extends('layouts.app')

@section('content')
    <div class="columns is-centered">
        <div class="section column is-half">
            <div class="box">
                <div class="level">
                    <a class="button level-left" href="/event">Back</a>
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
                        <form>
                            <div class="field">
                                <a class="is-pulled-left is-active" href="user_profile">Member 1</a>
                                <a class="is-pulled-right is-active">Manager</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel-block">
                    <div class="container">
                        <form>
                            <div class="field">
                                <a class="is-pulled-left is-active" href="user_profile">Member 2</a>
                                <a class="is-pulled-right is-active">Participant</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel-block">
                    <div class="container">
                        <form>
                            <div class="field">
                                <a class="is-pulled-left is-active" href="user_profile">Member 3</a>
                                <a class="is-pulled-right is-active">Participant</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel-block">
                    <div class="container">
                        <form>
                            <div class="field">
                                <a class="is-pulled-left is-active" href="user_profile">Member 4</a>
                                <a class="is-pulled-right is-active">Participant</a>
                            </div>
                        </form>
                    </div>
                </div>

            </nav>
        </div>
    </div>
@endsection

