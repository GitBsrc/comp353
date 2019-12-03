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
                           {{$group->groupName}}
                      </span> 
                   </p>
                   <p><span class="subtitle"><small>{{$group->groupDescription}}</small></span></p>
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
                      {{$group->groupName}}
                   </h1>
                   <!---->
                </div>
             </div>
             <div class="columns">
                <div class="column">
                   <p><span class="subtitle"><small>{{$group->groupDescription}}</small></span></p>
                </div>
             </div>
          </div>
       </div>
       <div rendered="{{$admin_user}}">
           edit button<br />delete button
        </div>
    </div>
    <div class="container">
       <hr>
    </div>
    <div class="container">
       <div class="columns">
          <div class="column level is-mobile">
             <a href="javascript:activateTab('group-posts')" class="level-item has-text-centered router-link-active">
                <div>
                   <p>{{$post_count}}</p>
                   <p>Posts</p>
                </div>
             </a>
             <a href="javascript:activateTab('group-events')" class="level-item has-text-centered">
                <div>
                   <p>{{$event_count}}</p>
                   <p>Events</p>
                </div>
             </a>
             <a href="javascript:activateTab('group-members')" class="level-item has-text-centered">
                <div>
                   <p>{{$member_count}}</p>
                   <p>Group Members</p>
                </div>
             </a>
          </div>
       </div>
    </div>
    <div class="container" id="tabCtrl">
       <div id="group-posts" style="display:block;">
            @foreach ($posts as $post)
                <div class="panel-block">
                    <div class="container">
                        <form>
                            <div class="field">
                            <!-- update this once posts are done so we 
                            can have post/{{$post->id}} and maybe a blurb -->
                                <a class="is-pulled-left is-active" href="">post contents</a>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
       </div>
       <div id="group-events" style="display:none;">

       </div>
       <div id="group-members" style="display:none;">
            @foreach ($group_members as $member)
                <div class="panel-block">
                    <div class="container">
                        <form>
                            <div class="field">
                                <p class="is-pulled-left is-active">{{$member->name}} - {{$member->email}}</p>
                                <a align="right" class="button is-pulled-right is-small">DM</a>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
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