@extends('layouts.app')

@section('content')
<div class="section">
    <div class="container">
        <div class="is-hidden-mobile">
           <div>
              <div class="columns is-mobile">
                 <div class="column is-1"></div>
                 <div class="column">
                    <div class="image">
                        <img class="is-rounded" src="images/default_avatar.png">
                     </div>
                 </div>
                 <div class="column is-1"></div>
                 <div class="column is-two-thirds content">
                    <p>
                       <div class="level"><span class="level-left title is-bold">
                        Event 1
                       </span>
                    <a class="button level-right" href="/edit_event">Edit</a></div>
                       <p><span class="title is-bold is-size-4">
                        Start Date
                       </span>
                       <span class="is-size-5">2019/04/16</span>
                       <br /></p>
                       <p><span class="title is-bold is-size-4">
                        End Date
                       </span>
                       <span class="is-size-5">2019/05/22 (extended)</span></p>
                       <p><span class="title is-bold is-size-4">
                        Location
                       </span>
                       <span class="is-size-5">Hall Building Concordia 8th floor</span></p>
                    </p>
                    <span class="title is-bold is-size-4">Description</span>
                    <p><span class="subtitle"><small>Evsehfe ubime ijufi lu sot zidic fe baope vaivove curdah mop mafu do iwuetpi ufji. Mud rejuga tem fevevu la avuazdo wi gec jespa sesa je jiosejeb pi gik maruape. Deverkap dansof du woki seluup uzanziz mot pohojce leana pe nulusej wilce ocuac. Pu pebholi kub vekebaz ra ziak vufoz hipwo ciw izurir abu nomsivow omkil fa medi. Tiza suzmif uzro zaeb vuin suz wos fo ripca cobguf ihobu do wine botuz cevde en icu. Meg taba uhgekpac bab ruf dakokvim gimtaodi so jek von ro pabit gifriwlu judav husgenmo juila.</small></span></p>
                 </div>
              </div>
           </div>
        </div>
        <div class="container">
            <hr>
        </div>
        <div class="container">
            <div class="columns">
               <div class="column level is-mobile">
                  <a href="/social-ui/#/u/me/i" class="level-item has-text-centered router-link-active">
                     <div>
                        <p>4</p>
                        <p>Posts</p>
                     </div>
                  </a>
                  <a href="/event_members" class="level-item has-text-centered">
                     <div>
                        <p>54</p>
                        <p>Participants</p>
                     </div>
                  </a>
                  <a href="/social-ui/#/u/me/e" class="level-item has-text-centered">
                     <div>
                        <p>3</p>
                        <p>Groups</p>
                     </div>
                  </a>
                  <a href="/social-ui/#/u/me/r" class="level-item has-text-centered">
                     <div>
                        <p>6</p>
                        <p>Join request</p>
                     </div>
                  </a>
               </div>
            </div>
         </div>
        <div class="is-hidden-tablet">
           <div>
              <div class="columns is-mobile">
                 <div class="column">
                    <div class="image is-1by1"><img src="https://placehold.it/256x256?text=people+48b446"></div>
                 </div>
                 <div class="column is-two-thirds">
                    <h1 class="title is-bold">
                       Garrett Stewart
                    </h1>
                    <!---->
                 </div>
              </div>
              <div class="columns">
                 <div class="column">
                    <p><span class="subtitle"><small>Evsehfe ubime ijufi lu sot zidic fe baope vaivove curdah mop mafu do iwuetpi ufji. Mud rejuga tem fevevu la avuazdo wi gec jespa sesa je jiosejeb pi gik maruape. Deverkap dansof du woki seluup uzanziz mot pohojce leana pe nulusej wilce ocuac. Pu pebholi kub vekebaz ra ziak vufoz hipwo ciw izurir abu nomsivow omkil fa medi. Tiza suzmif uzro zaeb vuin suz wos fo ripca cobguf ihobu do wine botuz cevde en icu. Meg taba uhgekpac bab ruf dakokvim gimtaodi so jek von ro pabit gifriwlu judav husgenmo juila.</small></span></p>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <div class="container">
        <hr>
     </div>
     <div class="container">
        <article class="media">
            <figure class="media-left">
                <p class="image is-64x64">
                <img src="https://bulma.io/images/placeholders/128x128.png">
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong>Barbara Middleton</strong>
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta eros lacus, nec ultricies elit blandit non. Suspendisse pellentesque mauris sit amet dolor blandit rutrum. Nunc in tempus turpis.
                        <br>
                        <small><a>Like</a> · <a>Reply</a> · 3 hrs</small>
                    </p>
                </div>
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-48x48">
                        <img src="https://bulma.io/images/placeholders/96x96.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                        <p>
                            <strong>Sean Brown</strong>
                            <br>
                            Donec sollicitudin urna eget eros malesuada sagittis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam blandit nisl a nulla sagittis, a lobortis leo feugiat.
                            <br>
                            <small><a>Like</a> · <a>Reply</a> · 2 hrs</small>
                        </p>
                        </div>

                        <article class="media">
                        Vivamus quis semper metus, non tincidunt dolor. Vivamus in mi eu lorem cursus ullamcorper sit amet nec massa.
                        </article>

                        <article class="media">
                        Morbi vitae diam et purus tincidunt porttitor vel vitae augue. Praesent malesuada metus sed pharetra euismod. Cras tellus odio, tincidunt iaculis diam non, porta aliquet tortor.
                        </article>
                    </div>
                </article>
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-48x48">
                        <img src="https://bulma.io/images/placeholders/96x96.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>Kayli Eunice </strong>
                                <br>
                                Sed convallis scelerisque mauris, non pulvinar nunc mattis vel. Maecenas varius felis sit amet magna vestibulum euismod malesuada cursus libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus lacinia non nisl id feugiat.
                                <br>
                                <small><a>Like</a> · <a>Reply</a> · 2 hrs</small>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </article>
        <article class="media">
            <figure class="media-left">
                <p class="image is-64x64">
                <img src="https://bulma.io/images/placeholders/128x128.png">
                </p>
            </figure>
            <div class="media-content">
                <div class="field">
                <p class="control">
                    <textarea class="textarea" placeholder="Add a comment..."></textarea>
                </p>
                </div>
                <div class="field">
                <p class="control">
                    <button class="button">Post comment</button>
                </p>
                </div>
            </div>
        </article>
    </div>
    <button class="modal-close"></button>
    </div>
    </div>
    </div>
 </div>
@endsection
