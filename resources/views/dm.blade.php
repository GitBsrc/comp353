@extends('layouts.app')

@section('content')
<section class="hero is-info is-fullheight-with-navbar">
<div class="hero-body">
        <div class="container">
           <div class="columns is-centered">
              <div class="column">
              <div class="level-left">
                 <article class="message is-small column is-two-fifths">
                  <div class="message-header">
                    <figure class="media-left">
                       <p class="image is-64x64 sui-avatar"><img class="is-rounded" src="/images/users.png"></p>
                    </figure>
                    <p><a href="/social-ui/#/c/3f9387a3d91e696a"><strong>Tester 1</strong></a> </p>
                  </div>
                    <div class="message-body">
                             <span>
                               Hey, my name is Tester 1.
                             </span>
                    </div>
                 </article>
              </div>
             </div>
           </div>
         
         <div class="columns is-centered">
           <div class="column">
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
              </div>
            </div>

         <div class="container">
           <div class="columns is-centered">
              <div class="column">
              <div class="level-left">
                 <article class="message is-small column is-two-fifths">
                  <div class="message-header">
                    <figure class="media-left">
                       <p class="image is-64x64 sui-avatar"><img class="is-rounded" src="/images/users.png"></p>
                    </figure>
                    <p><a href="/social-ui/#/c/3f9387a3d91e696a"><strong>Tester 1</strong></a> </p>
                  </div>
                    <div class="message-body">
                             <span>
                               Fine, how about you?
                             </span>
                    </div>
                 </article>
              </div>
             </div>
           </div>

           <div class="columns is-centered">
           <div class="column">
              <div class="level-right">
                 <article class="message is-small is-success column is-two-fifths ">
                  <div class="message-header">
                    <figure class="media-left">
                       <p class="image is-64x64 sui-avatar"><img class="is-rounded" src="/images/users.png"></p>
                    </figure>
                    <p><a href="/social-ui/#/c/3f9387a3d91e696a"><strong>Tester 2</strong></a> </p>
                  </div>
                    <div class="message-body">
                             <span>
                               Great, what's up?
                             </span>
                    </div>
                 </article>
                 </div>
              </div>
            </div>

            <div class="container">
           <div class="columns is-centered">
              <div class="column">
              <div class="level-left">
                 <article class="message is-small column is-two-fifths">
                  <div class="message-header">
                    <figure class="media-left">
                       <p class="image is-64x64 sui-avatar"><img class="is-rounded" src="/images/users.png"></p>
                    </figure>
                    <p><a href="/social-ui/#/c/3f9387a3d91e696a"><strong>Tester 1</strong></a> </p>
                  </div>
                    <div class="message-body">
                             <span>
                               Nothing much.
                             </span>
                    </div>
                 </article>
              </div>
             </div>
           </div>

           <div class="columns is-centered">
           <div class="column">
              <div class="level-right">
                 <article class="message is-small is-success column is-two-fifths ">
                  <div class="message-header">
                    <figure class="media-left">
                       <p class="image is-64x64 sui-avatar"><img class="is-rounded" src="/images/users.png"></p>
                    </figure>
                    <p><a href="/social-ui/#/c/3f9387a3d91e696a"><strong>Tester 2</strong></a> </p>
                  </div>
                    <div class="message-body">
                             <span>
                               Sounds good. :)
                             </span>
                    </div>
                 </article>
                 </div>
              </div>
            </div>

            <article class="media">
            <figure class="media-left">
                <p class="image is-64x64">
                      <img class="is-rounded" src="/images/users.png">
                </p>
            </figure>
               <div class="media-content">
                  <div class="field">
                       <p class="control">
                       <textarea class="textarea" placeholder="Write a message..."></textarea>
                       </p>
                  </div>
                  <div class="field">
               <p class="control">
                   <button class="button">Send Message</button>
               </p>
             </div>
           </div>
        </article>
        </div> 
   </div>
</div>
@endsection
