@extends('layouts.app')

@section('content')
  @isset ($error)
    <div class="alert alert-danger feedback-box shadow-transition" id="error-box">
      <button type="button" class="close" data-target="#incorrectAns" data-dismiss="alert">
        <span aria-hidden="true">X</span>
      </button>
      {{$error}}
    </div>
  @endisset
  <!--Main form -->
  <div class="container" id="form-container">
      <div class="row">
          <div class="col text-center">
            <div id="header-div">
              <div id="main-header">URL Shortener</div>
              <div id="sub-header">make long links easy to share</div>
            </div>
          </div>
      </div>
      <!-- /.row -->
      <form method="POST" action="/shorten/shorten" id="main-form">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="link-input">Paste your link below</label>
          <input type="text" class="form-control" id="link-input" name="link-input" placeholder="http://" value='{{isset($url)?$url:""}}' required autofocus>
        </div>
        <button type="submit" class="btn btn-primary btn-lg" id="main-submit">Shorten it!</button>
      </form>

    @isset ($shortUrl)
      <div id="output">
        <h2>shortened url </h2>
        <div class="alert alert-success shadow-transition" id = "shorturl" onclick="copyToClipboard()">
          {{env('APP_URL', 'localhost')}}/{{$shortUrl}}
        </div>
        <p id="copy-msg">click link to copy to clipboard</p>
      </div>
    @endisset
  </div> <!-- /.container -->
@endsection
