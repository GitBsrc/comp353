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
          <a class="button" href="create_event">+</a>
        </div>
        <p class="panel-tabs">
          <a class="is-active">All</a>
          <a>Joined</a>
          <a>Upcoming</a>
        </p>
        <div class="panel-block">
        <div class="container">
            <form>
              <div class="field">
                  <a class="is-pulled-left is-active" href="event">Event 1</a>
              </div>
              <div class="field">
                  <a class="button is-pulled-right is-small">Join</a>
              </div>
            </form>
          </div>
        </div>
        <div class="panel-block">
            <div class="container">
                <form>
                  <div class="field">
                      <a class="is-pulled-left is-active" href="event">Event 2</a>
                  </div>
                  <div class="field">
                      <a class="button is-pulled-right is-small is-static">Requested</a>
                  </div>
                </form>
              </div>
            </div>
            <div class="panel-block">
                <div class="container">
                    <form>
                      <div class="field">
                          <a class="is-pulled-left is-active" href="event">Event 3</a>
                      </div>
                      <div class="field">
                          <a class="button is-pulled-right is-small">Join</a>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="panel-block">
                    <div class="container">
                        <form>
                          <div class="field">
                              <a class="is-pulled-left is-active" href="event">Event 4</a>
                          </div>
                          <div class="field">
                              <a class="button is-pulled-right is-small">Join</a>
                          </div>
                        </form>
                      </div>
                    </div>

      </nav>
</div>
</div>
@endsection

