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
  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label">Privacy</label>
    </div>
    <div class="field-body">
      <div class="field is-narrow">
        <div class="control">
          <div class="select is-fullwidth">
            <select>
              <option>View Only</option>
              <option>View & Comment</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="field is-horizontal">
    <div class="field-label">
      <label class="label">Upload a Picture/Video/Post</label>
    </div>
    <div class="field-body">
      <div class="field is-narrow">
            <div class="file">
                    <label class="file-label">
                      <input class="file-input" type="file" name="resume">
                      <span class="file-cta">
                        <span class="file-icon">
                          <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                          Choose a file…
                        </span>
                      </span>
                    </label>
                  </div>
      </div>
    </div>
  </div>
  
  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label">Share In</label>
    </div>
    <div class="field-body">
      <div class="field">
            <div class="control">
                    <div class="select">
                      <select>
                        <option>Events...</option>
                      </select>
                    </div>
                  </div>
      </div>
    </div>
  </div>

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
          <a class="button is-primary" type="submit" href="/posts" value="reply">Create Post</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection