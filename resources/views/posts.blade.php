@extends('layouts.app')

@section('content')
<section class="hero is-primary">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
        Event Contents
        </h1>
        <div class="box has-text-centered">
            <a class="button is-primary" type="submit" href="/postform" value="Create New Post">Create New Post</a>
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
                        <small><a>Like</a> · <a href="/commentpost">Reply (only if allowed)</a> · 3 hrs</small>
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
                            <small><a>Like</a> · 2 hrs</small>
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
                                <small><a>Like</a> ·  2 hrs</small>
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
                <div class="control">
                    <div class="select">
                      <select>
                        <option>View Only</option>
                        <option>View & Comment</option>
                      </select>
                    </div>
                  </div>
                    <button class="button is-primary">Post comment</button>
            </div>
        </article>
    </div>
</section>
@endsection
