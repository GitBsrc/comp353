@extends('layouts.app')

@section('content')
<section class="hero is-primary">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
        Posts
        </h1>
        <div class="box has-text-centered">
            <a class="button is-primary" type="submit" href="/create_post" value="Create New Post">Create New Post</a>
        </div>
      </div>
    </div>
  </section>

<section class="section is-light">
        <div class="container">
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
                        {{$post->postContent}}
                        <br>
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
                <div class="field is-horizontal">
                     <div class="field-label is-normal">
                         <label class="label">Allow Replies</label>
                     </div>
                     <div class="field-body">
                      <div class="field is-narrow">
                          <div class="control">
                            <input type="checkbox" name="canComment" class="switch-input" value="1">
                        </div>
                        </div>
                    </div>
                </div>
                              
                    <button class="button is-primary">Post comment</button>
            </div>
        </article>
    </div>
</section>
@endsection
