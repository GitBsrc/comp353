@extends('layouts.app')

@section('content')
<section class="hero is-primary is-fullheight-with-navbar">
<div class="hero-body">
<div class="container has-text-centered">
    <p class="title">Chat</p>
  <div class = "has-padding-left-110  has-padding-right-110">
    <div class="list">
    @if(count($dmrecipients) > 0)
        @foreach($dmrecipients as $dmrecipient)
         <a class="list-item" href= "/dm/message/{{$dmrecipient}}">
           <figure class="media-left">
             <p class="image is-64x64 sui-avatar"><img class="is-rounded" src="/images/users.png"></p>
           </figure>
                           {{$dmrecipient}}
         </a>
         @endforeach
      @else
         <a class="list-item">
              <b> No DM Sent </b>
         </a>
      @endif
    </div>
  </div>
</div>
</div>
</section>
@endsection