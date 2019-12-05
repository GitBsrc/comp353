@extends('layouts.app')

@section('content')
    <div class="columns is-centered">
        <div class="section column is-half">
            <nav class="panel">
                <div class="level panel-heading">
                    <a class="button level-left" href="/event/{{$event->id}}">Back</a>
                    <span class="level-item title is-bold">
                     Event Details
                    </span>
                </div>
                <div class="panel-block">
                    <div class="container">
                            <div class="panel-block">
                                <div class="container">
                                    <form>
                                        <div class="field">
                                            <a class="is-pulled-left">Bandwidth</a>
                                        </div>
                                        <div class="field">
                                            <a class="button is-pulled-right is-small is-disabled">{{$event->bandwidth}} mb/s</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                <div class="panel-block">
                        <div class="container">
                            <form>
                                <div class="field">
                                    <a class="is-pulled-left">Storage</a>
                                </div>
                                <div class="field">
                                    <a class="button is-pulled-right is-small is-disabled">{{$event->storage}} GB</a>
                                </div>
                            </form>
                        </div>
                    </div>

                <div class="panel-block">
                        <div class="container">
                            <form>
                                <div class="field">
                                    <a class="is-pulled-left">Price</a>
                                </div>
                                <div class="field">
                                    <a class="button is-pulled-right is-small is-disabled">{{$event->price}} $</a>
                                </div>
                            </form>
                        </div>
                    </div>

                <div class="panel-block">
                        <div class="container">
                            <form>
                                <div class="field">
                                    <a class="is-pulled-left">Discount</a>
                                </div>
                                <div class="field">
                                    <a class="button is-pulled-right is-small is-disabled">{{$event->discount}} %</a>
                                </div>
                            </form>
                        </div>
                    </div>

                <div class="panel-block">
                        <div class="container">
                            <form>
                                <div class="field">
                                    <a class="is-pulled-left">Repeated</a>
                                </div>
                                <div class="field">
                                    <a class="button is-pulled-right is-small is-disabled">{{$event->recurrence}} times</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
@endsection

