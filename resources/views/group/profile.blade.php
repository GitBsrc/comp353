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
                
               @if($isLeader || $isAdmin ?? '')
                  <div class="column group-admin-privileges" rendered="{{$isLeader}}">
                     <a class="button is-pulled-right" href="/group/{{$group->id}}/edit_group">Edit Group</a><br />
                     <form method="post" action="/delete_group/{{$group->id}}">
                        @csrf
                        <p><button class="button is-pulled-right is-danger" type="submit">Delete Group</button></p>
                     </form>
                  </div>
               @endif
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
                </div>
             </div>
             <div class="columns">
                <div class="column">
                   <p><span class="subtitle"><small>{{$group->groupDescription}}</small></span></p>
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
       <div id="group-events" style="display:none;">
         @foreach ($events as $event)
            <div class="panel-block">
               <div class="container">
                  <form>
                     <div class="field">
                        <a class="is-pulled-left is-active" href="/event/{{$event->id}}">{{$event->name}}</a>
                     </div>
                  </form>
               </div>
            </div>
         @endforeach
       </div>
       <div id="group-members" style="display:none;">
            @if($isLeader)
           <div class="group-admin-privileges" rendered="{{$isLeader}}">
               <a class="button" href="/group/{{$group->id}}/add_members">Add User(s)</a>
               <a class="button" href="javascript:toggleEdit()">Edit User(s)</a>
               <button class="hiddenBlock button is-pulled-right" style="align:right; display:none;" ><a href="javascript:toggleEdit()">Finish Editing</a></button>
            </div>
            @endif
            <div class="panel-block">
               <p class="control has-icons-left">
                  <input class="input" type="text" placeholder="Search Members">
                  <span class="icon is-left">
                     <i class="fas fa-search" aria-hidden="true"></i>
                  </span>
               </p>
            </div>
            @foreach ($group_members as $member)
                <div class="panel-block">
                    <div class="container">
                            <div class="field">
                                <p class="is-pulled-left is-active">{{$member->name}} - {{$member->email}}</p>
                                <a class="hiddenBlock button is-pulled-right is-small" 
                                    style="align:right; display:block;" 
                                    href="/dm/{{$member->id}}">DM</a>
                                    <form method="post" action="/make_leader/{{$group->id}}/{{$member->id}}">
                                       @csrf
                                       <button class="hiddenBlock button is-pulled-right is-small" 
                                          style="align:right; display:none;" type="submit"
                                          rendered="{{$isLeader}}">Make Leader</button>
                                    </form>
                                    <form method="post" action="/delete_member/{{$group->id}}/{{$member->id}}">
                                       @csrf
                                       <button class="hiddenBlock button is-pulled-right is-small is-danger" 
                                          style="align:right; display:none;" type="submit"
                                          rendered="{{$isLeader}}">Delete</button>
                                    </form>
                            </div>
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

      function toggleEdit(){
         var blocksCtrl = document.getElementsByClassName('hiddenBlock');
         for(var i = 0; i < blocksCtrl.length; i++){
            var block = blocksCtrl[i];
            if(block.style.display === 'none'){
               block.style.display = 'block';
            }
            else {
               block.style.display = 'none';
            }
         }
      }
      function saveEdit(){

      }

      function search() {
         // Declare variables
         var input, filter, list, results, a, i, txtValue;
         input = document.getElementById('search');
         filter = input.value.toUpperCase();
         list = document.getElementById("listSearch");
         results = list.getElementsByTagName('div');
         
         // Loop through all list items, and hide those who don't match the search query
         for (i = 0; i < results.length; i++) {
            a = results[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
               results[i].style.display = "";
            } else {
               results[i].style.display = "none";
            }
         }
      }

</script>