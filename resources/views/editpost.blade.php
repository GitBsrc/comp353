@extends('layouts.app')

@section('content')
<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
      Edit Post
      </h1>
    </div>
  </div>
</section>

<section class="section is-light">
  <form action="/editpost" method="post" enctype="multipart/form-data">
    @csrf
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Allow Replies</label>
      </div>
      <div class="field-body">
        <div class="field is-narrow">
          <div class="control">
              <input type="checkbox" name="canComment" class="switch-input">
          </div>
        </div>
      </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Upload</label>
        </div>
        <div class="field-body">
          <div class="field">
                <div class="control">
                <input id="post_image" type="file" class="form-control" name="post_image">
            </div>
          </div>
        </div>
      </div>
    
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Caption</label>
      </div>
      <div class="field-body">
        <div class="field">
          <div class="control">
            <textarea name="postContent" class="textarea" placeholder="e.g. Join us this weekend for free breakfast!"></textarea>
          </div>
        </div>
      </div>
    </div>
    
    <div class="field is-horizontal">
      <div class="field-label">
        <!-- Left empty for spacing -->
      </div>
      <div class="field-body">
        <div class="field">
          <div class="control">
            <button class="button is-primary" type="submit">Save Post</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</section>
@endsection