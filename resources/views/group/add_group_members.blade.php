@extends('layouts.app')

@section('content')
    <div class="columns is-centered">
        <div class="section column is-half">
            <div class="box">
                <div class="level">
                    <a class="button level-left" href="/group/{{$group->id}}">Back</a>
                    <span class="level-item title is-bold">
                        Members Manager - Adding member
                    </span>
                </div>
                <div class="panel-block">
                    <p>Group: {{$group->groupName}}</p>
                </div>
                
                
      <form method="post" action="/add_member/{{$group->id}}">
        @csrf
                <div class="field panel-block dropdown">
                    <p class="control has-icons-left dropdown-trigger">
                        <input class="input" id="search" type="text" placeholder="Search Members" onkeyup="search()">
                        <span class="icon is-left">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                    </p>
                    <div class="dropdown-menu" id="dropdown-menu3" role="menu">
                        <div class="dropdown-content" id="listSearch">
                            @foreach($users as $user)
                            <div class="dropdown-item">
                                <a href="#" onClick="autoFill('{{$user->id}}', '{{$user->name}}', '{{$user->email}}'); return false;" role="button">
                                    {{$user->id}} - {{$user->name}} - {{$user->email}}
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">ID</label>
                    <div class="control">
                        <input class="input id" type="text" placeholder="e.g 3" name="id" value="">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input name" type="text" placeholder="e.g Eve" name="name" value="">
                    </div>
                </div>

                <div class="field">
                    <label class="label">E-mail</label>
                    <div class="control">
                        <input class="input email" type="email" placeholder="e.g eb@email.com" name="email" value="">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Make User a Leader</label>
                    <div class="control">
                        <input type="checkbox" name="isLeader[]">
                    </div>
                </div>

                <br />
                <p>
                        <button class="button is-fullwidth" type="submit">Save</button>
                </p>
      </form>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>

<script>

document.addEventListener('DOMContentLoaded', function () {

  // Dropdowns

  var $dropdowns = getAll('.dropdown:not(.is-hoverable)');

  if ($dropdowns.length > 0) {
    $dropdowns.forEach(function ($el) {
      $el.addEventListener('click', function (event) {
        event.stopPropagation();
        $el.classList.toggle('is-active');
      });
    });

    document.addEventListener('click', function (event) {
      closeDropdowns();
    });
  }

  function closeDropdowns() {
    $dropdowns.forEach(function ($el) {
      $el.classList.remove('is-active');
    });
  }

  // Close dropdowns if ESC pressed
  document.addEventListener('keydown', function (event) {
    var e = event || window.event;
    if (e.keyCode === 27) {
      closeDropdowns();
    }
  });

  // Functions

  function getAll(selector) {
    return Array.prototype.slice.call(document.querySelectorAll(selector), 0);
  }
});

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

function autoFill(id, name, email) {
    $('.id').val(id);
    $('.name').val(name);
    $('.email').val(email);
}
</script>
