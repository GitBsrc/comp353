@extends('layouts.app')

@section('content')
  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label">Privacy</label>
    </div>
    <div class="field-body">
      <div class="field is-narrow">
        <div class="control">
          <div class="select is-fullwidth">
            <select>
              <option>Can View</option>
              <option>Can Edit</option>
              <option>Can Comment</option>
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
            <div class="file has-name is-right">
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
                      <span class="file-name">
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
                        <option>Select dropdown</option>
                        <option>With options</option>
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
          <button class="button is-primary">
            Create Post
          </button>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection