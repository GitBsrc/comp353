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
                      <span class="title is-bold">
                            {{$user->name}}
                      </span> 
                   </p>
                   <p><span class="subtitle"><small>Evsehfe ubime ijufi lu sot zidic fe baope vaivove curdah mop mafu do iwuetpi ufji. Mud rejuga tem fevevu la avuazdo wi gec jespa sesa je jiosejeb pi gik maruape. Deverkap dansof du woki seluup uzanziz mot pohojce leana pe nulusej wilce ocuac. Pu pebholi kub vekebaz ra ziak vufoz hipwo ciw izurir abu nomsivow omkil fa medi. Tiza suzmif uzro zaeb vuin suz wos fo ripca cobguf ihobu do wine botuz cevde en icu. Meg taba uhgekpac bab ruf dakokvim gimtaodi so jek von ro pabit gifriwlu judav husgenmo juila.</small></span></p>
                </div>
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
       <div class="columns">
          <div class="column level is-mobile">
             <a href="/social-ui/#/u/me/i" class="level-item has-text-centered router-link-active">
                <div>
                   <p>4</p>
                   <p>Items</p>
                </div>
             </a>
             <a href="/social-ui/#/u/me/c" class="level-item has-text-centered">
                <div>
                   <p>0</p>
                   <p>Collections</p>
                </div>
             </a>
             <a href="/social-ui/#/u/me/e" class="level-item has-text-centered">
                <div>
                   <p>13</p>
                   <p>Following</p>
                </div>
             </a>
             <a href="/social-ui/#/u/me/r" class="level-item has-text-centered">
                <div>
                   <p>6</p>
                   <p>Followers</p>
                </div>
             </a>
          </div>
       </div>
    </div>
    <div class="container">
       <div class="profile-items">
          <div class="columns is-multiline is-mobile">
             <div class="column is-one-third">
                <div class="button" style="    height: 100%;
                text-align: center;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;">
                   <div class="content">
                      <p><span class="icon"><i class="fa fa-plus"></i></span></p>
                      <p>
                         ADD ITEM
                      </p>
                   </div>
                </div>
             </div>
             <div class="column is-one-third">
                <div class="image is-1by1"><img src="https://placehold.it/256x256?text=+6128a7314339"></div>
             </div>
             <div class="column is-one-third">
                <div class="image is-1by1"><img src="https://placehold.it/256x256?text=+5ed30d056837"></div>
             </div>
             <div class="column is-one-third">
                <div class="image is-1by1"><img src="https://placehold.it/256x256?text=+7155ebf90814"></div>
             </div>
             <div class="column is-one-third">
                <div class="image is-1by1"><img src="https://placehold.it/256x256?text=+86cbcac2add0"></div>
             </div>
          </div>
          <div class="modal">
             <div class="modal-background"></div>
             <div class="modal-content">
                <div class="box">
                   <div class="columns">
                      <div class="column">
                         <div class="image is-1by1"><img></div>
                      </div>
                      <div class="column">
                         <h1 class="title">
                            Some 
                         </h1>
                         <h2 class="subtitle"><small>
                            Curator: Garrett Stewart
                            <br>
                            ImageId: 
                            </small>
                         </h2>
                         <p><small>
                            </small>
                         </p>
                      </div>
                   </div>
                </div>
             </div>
             <button class="modal-close"></button>
          </div>
       </div>
    </div>
 </div>
@endsection
