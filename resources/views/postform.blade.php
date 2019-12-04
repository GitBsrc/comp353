@extends('layouts.app')

@section('content')
<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
      Create New Post
      </h1>
    </div>
  </div>
</section>

<section class="section is-light">
  <form action="/storepost" method="post" enctype="multipart/form-data">
    @csrf
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
     
    <!-- get list of events -->
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Share In</label>
      </div>
      <div class="field-body">
        <div class="field">
              <div class="control">
                      <div class="select">
                        <select>
                          <option> Other events... </option>
                        </select>
                      </div>
                    </div>
        </div>
      </div>
    </div>

<!-- get list of posts --> 
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Link to</label>
      </div>
      <div class="field-body">
        <div class="field">
              <div class="control">
                      <div class="select">
                        <select>
                          <option>Other Posts...</option>
                        </select>
                      </div>
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
            <textarea class="textarea" placeholder="e.g. Join us this weekend for free breakfast!"></textarea>
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
            <button class="button is-primary" type="submit">Create Post</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</section>
@endsection