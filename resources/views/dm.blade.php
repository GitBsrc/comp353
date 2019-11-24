@extends('layouts.app')

@section('content')
<div class="section">
        <div class="container">
           <div class="columns is-centered">
              <div class="column">
              <div class="level-left">
                 <article class="message is-small column is-two-fifths">
                  <div class="message-header">
                    <figure class="media-left">
                       <p class="image is-64x64 sui-avatar"><img class="is-rounded" src="http://placehold.it/64x64"></p>
                    </figure>
                    <p><a href="/social-ui/#/c/3f9387a3d91e696a"><strong>Tester 1</strong></a> </p>
                  </div>
                    <div class="message-body">
                             <span>
                               Hi, my name is Tester 1.
                             </span>
                    </div>
                 </article>
              </div>
             </div>
           </div>
         
         <div class="columns is-centered">
           <div class="column">
              <div class="level-right">
                 <article class="message is-small is-info column is-two-fifths ">
                  <div class="message-header">
                    <figure class="media-left">
                       <p class="image is-64x64 sui-avatar"><img class="is-rounded" src="http://placehold.it/64x64"></p>
                    </figure>
                    <p><a href="/social-ui/#/c/3f9387a3d91e696a"><strong>Tester 2</strong></a> </p>
                  </div>
                    <div class="message-body">
                             <span>
                               Hi, my name is Tester 2.
                             </span>
                    </div>
                 </article>
                 </div>
              </div>
            </div>
            <article class="media">
            <figure class="media-left">
                <p class="image is-64x64">
                      <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
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
@endsection
