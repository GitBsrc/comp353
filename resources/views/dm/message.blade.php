@extends('layouts.app')
@section('content')
<section class="hero is-primary is-fullheight-with-navbar">
    <div class="hero-body">
        <div class="container">
            @foreach($dms as $dm)
            <div class="columns is-centered">
                <div class="column">
                {{-- Trying to refer to the foreign key to get the value of sender in dmmessage model --}}
                {{-- If condition, to check if the message is created by the authenticated user and check if it is send to the specific recipient--}}

                  @if(($dm->dm_messages->sender == $user_id) && ($dm->recipient == $recipient))
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
                                   {{$dm->dm_messages->message_body}}
                             </p>
                            </div>
                        </article>
                    </div>
                    @elseif(($dm->dm_messages->sender == $recipient) && ($dm->recipient == $user_id))
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
                                   {{$dm->dm_messages->message_body}}
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