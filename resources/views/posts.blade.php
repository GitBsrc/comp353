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
                        <small><a href="/commentpost">Reply</a></small>
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
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </article>
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta eros lacus, nec ultricies elit blandit non. Suspendisse pellentesque mauris sit amet dolor blandit rutrum. Nunc in tempus turpis.
                        {{$post->post_image}}
                        <br>
                        <small><a href="/commentpost">Reply</a> · @if($post->userID == $id)
                            <a href="/commentpost">Edit</a>
                            @endif · {{$post->created_at}}</small>
                        
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
