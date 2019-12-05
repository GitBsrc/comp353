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
                       <div class="level">
                          <span class="level-left title is-bold">
                              {{$event->name}}
                           </span>
                           <div class="level-right">
                              @if( ($isAdmin ?? '') || ($isManager ?? ''))
                              <a class="button level-right" href="/edit_event/{{$event->id}}">Edit</a>
                              @endif
                              <a class="button level-right" href="/event_details/{{$event->id}}">Details</a>
                           </div>
                        </div>

                     <p><span class="title is-bold is-size-4">
                        Start Date
                       </span>
                       <span class="is-size-5">{{$event->startDate}}</span>
                       <br /></p>

                     <p><span class="title is-bold is-size-4">
                        End Date
                     </span>
                     <span class="is-size-5">{{$event->endDate}}</span></p>

                     <p><span class="title is-bold is-size-4">
                        Location
                     </span>
                     <span class="is-size-5">{{$event->location}}</span></p>

                     <p><span class="title is-bold is-size-4">
                        Status
                     </span>
                     <span class="is-size-5"><small>{{$event->status}}</small></span></p>

                     <p><span class="title is-bold is-size-4">
                        Description
                     </span></p>
                    <p><span class="subtitle"><small>{{$event->description}}</small></span></p>

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
                  <a href="javascript:activateTab('event-posts')" class="level-item has-text-centered router-link-active">
                     <div>
                        <p>Posts</p>
                     </div>
                  </a>
                  <a href="/event_members/{{$event->id}}" class="level-item has-text-centered">
                     <div>
                        <p>Participants</p>
                     </div>
                  </a>
                  <a href="javascript:activateTab('event-groups')" class="level-item has-text-centered">
                     <div>
                        <p>Groups</p>
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
     <div class="container" id="tabCtrl">
     <div id="event-posts" style="display:bock;">
         @foreach ($posts as $post)
         <article class="media">
            <figure class="media-left">
                <p class="image is-64x64">
                <img src="https://bulma.io/images/placeholders/128x128.png">
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong>{{$post->firstName}}</strong>
                        <br>
                        @if($post->postContent != null)
                        {{$post->postContent}}
                        <br>
                        @endif
                        @if($post->post_image != null)
                        <img src="{{ \Storage::url($post->post_image)}}" alt="">
                        <br>
                        @endif
                        <small>
                            @if($post->canComment == 1)
                            <a href="/commentpost">Reply</a>
                            @endif  
                            @if($post->userID == $id)
                            <a href="/editpost">Edit</a>
                            @endif · {{$post->created_at}}
                        </small>
                        
                    </p>
                </div>
            </div>
         </article>
         @endforeach
      </div>
      <div id="event-groups" style="display:none;">
         @if(($isAdmin ?? '') || ($isManager ?? ''))
          <div class="level"> 
            <a class="button is-pulled-left" href="/create_group/{{$event->id}}">Add Event Group</a>
          </div>
          @endif
          <div class="columns">
            @foreach ($groups as $group)
               @if($group->groupIsPublic == 1 || $isAdmin ?? '')
                  <div class="column">
                     <div class="card">
                        {{-- <div class="card-image">
                           <figure class="image is-4by3">
                              <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                           </figure>
                        </div> --}}
                        <div class="card-content">
                           <div class="media-content">
                           <a class="title is-4" href="group/{{$group->id}}">{{$group->groupName}}</a>
                           </div>
                        </div>
                        <div class="content has-padding-20">
                           Description: {{$group->groupDescription}}
                           <br>
                           <time datetime="2016-1-1">Created: {{$group->created_at}}</time>
                        </div>
                     </div>
                  </div>
               @endif
            @endforeach
          </div>
       </div>
    </div>
    <button class="modal-close"></button>
    </div>
    </div>
    </div>
 </div>
@endsection

<script type="text/javascript">

      function activateTab(tabID) {
          var tabCtrl = document.getElementById('tabCtrl');
          var pageToActivate = document.getElementById(tabID);
          for (var i = 0; i < tabCtrl.childNodes.length; i++) {
              var node = tabCtrl.childNodes[i];
              if (node.nodeType == 1) { /* Element nodes only */
                  node.style.display = (node == pageToActivate) ? 'block' : 'none';
              }
          }
      }

</script>