@extends('layouts.app')
@section('content')
<section class="hero is-primary is-fullheight-with-navbar">
    <div class="hero-body">
        <div class="container">
            @foreach($dms as $dm)
            <div class="columns is-centered">
                <div class="column">
                  @if($dm->message_id == '1') {{-- for testing purposes --}}
                    <div class="level-left">
                        <article class="message is-small column is-two-fifths">
                            <div class="message-header">
                                <figure class="media-left">
                                    <p class="image is-64x64 sui-avatar"><img class="is-rounded" src="/images/users.png"></p>
                                </figure>
                                <p><a href="/social-ui/#/c/3f9387a3d91e696a"><strong>Tester 1</strong></a> </p>
                            </div>
                            <div class="message-body">
                             <p>
                                   {{$dm->message_id}}
                             </p>
                            </div>
                        </article>
                    </div>
                    @else
                    <div class="level-right">
                        <article class="message is-small is-success column is-two-fifths ">
                            <div class="message-header">
                                <figure class="media-left">
                                    <p class="image is-64x64 sui-avatar"><img class="is-rounded" src="/images/users.png"></p>
                                </figure>
                                <p><a href="/social-ui/#/c/3f9387a3d91e696a"><strong>Tester 2</strong></a> </p>
                            </div>
                            <div class="message-body">
                                <p>
                                    Hey Tester 1, how are you doing today? :)
                                </p>
                            </div>
                        </article>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
            
            <article class="media">
                <figure class="media-left">
                    <p class="image is-64x64">
                        <img class="is-rounded" src="/images/users.png">
                    </p>
                </figure>
                <div class="media-content">
                    <form action="/dm/message/{{$recipient->id}}" method="post">
                        @csrf
                        <div class="field">
                            <p class="control">
                                <textarea class="textarea" placeholder="Write a message..." name="message"></textarea>
                            </p>
                        </div>
                        <div class="field">
                            <p class="control">
                                <button type="submit" class="button">Send Message</button>
                            </p>
                        </div>
                    </form>
                </div>
            </article>
        </div>
    </div>
</section>
@endsection