@extends('layouts.app')

@section('content')
<section class="hero is-primary">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
        Comment to Post
        </h1>
        <div class="field">
            <div class="control">
              <textarea class="textarea is-primary" placeholder="Write a comment..."></textarea>
            </div>
          </div>
          <div class="box has-text-centered">
            <a class="button is-primary" type="submit" href="/posts" value="reply">Submit</a>
          </div>
      </div>
    </div>
  </section>

</section>
@endsection