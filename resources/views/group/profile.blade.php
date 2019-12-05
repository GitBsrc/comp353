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
                
               @if($isLeader)
                  <div class="column group-admin-privileges" rendered="{{$admin_user}}">
                     <a class="button" class="is-pulled-left is-active" href="/group/{{$group->id}}/edit_group">Edit Group</a><br />
                     <a class="button" class="is-pulled-left is-active" href="">Delete Group</a>
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
            @if($isLeader)
           <div class="group-admin-privileges" rendered="{{$admin_user}}">
               <a class="button" href="/group/{{$group->id}}/add_members">Add User(s)</a>
               <a class="button" href="javascript:activateEdit()">Edit User(s)</a>
               <!-- update this : save method -->
               <a class="hiddenBlock button is-pulled-right" style="align:right; display:none;" href="">Save changes</a>
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
                        <form>
                            <div class="field">
                                <p class="is-pulled-left is-active">{{$member->name}} - {{$member->email}}</p>
                                <a class="hiddenBlock button is-pulled-right is-small" style="align:right; display:block;" href="">DM</a>
                                <a class="hiddenBlock button is-pulled-right is-small" style="align:right; display:none;" href="" rendered="{{$admin_user}}">Make Leader</a>
                                <a class="hiddenBlock button is-pulled-right is-small" style="align:right; display:none;" href="" rendered="{{$admin_user}}">Delete</a>
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

      function activateEdit(){
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
      function endEdit(){

      }

</script>