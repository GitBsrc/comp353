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
                  <p><a href="/dm/{{$user->id}}" class="button"><small>Send Message</small></a></p>
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
                      {{$user->name}}
                   </h1>
                   <!---->
                </div>
             </div>
             <div class="columns">
                <div class="column">
                   <p><span class="subtitle"><small>user info.</small></span></p>
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
             <a href="javascript:activateTab('user-posts')" class="level-item has-text-centered router-link-active">
                <div>
                   <p>{{$post_count}}</p>
                   <p>Posts</p>
                </div>
             </a>
             <a href="javascript:activateTab('user-groups')" class="level-item has-text-centered">
                <div>
                   <p>{{$group_count}}</p>
                   <p>Groups</p>
                </div>
             </a>
          </div>
       </div>
    </div>
    <div class="container" id="tabCtrl">
       <div id="user-posts" style="display:block;">
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
                            @if($post->userID == $user->id)
                            <a href="/editpost">Edit</a>
                            @endif · {{$post->created_at}}
                        </small>
                        
                    </p>
                </div>
            </div>
         </article>
         @endforeach
       </div>
       <div id="user-groups" style="display:none;">
          <div class="columns">
            @foreach ($groups as $group)
               @if($group->groupIsPublic == 1 || $isHome)
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