@extends('layouts.app')

@section('content')
<div class="container">
  <div class="panel panel-success  shadow-transition">
    <div class="panel-heading">
      Account Dashboard - Welcome {{Auth::user()->name}}!
    </div>
    <div class="panel-body">
      <h3 class="center-header">Account History</h3>

      @if (!Auth::guest())
        <div id="history-table">
          <table class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th colspan="3">Url</th>
                <th colspan="3">Short Url</th>
                <th colspan="1">Visits</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($links as $link)
                <tr>
                  <td colspan="3">{{$link->url}}</td>
                  <td colspan="3">{{env('APP_URL', 'localhost')}}/{{$link->shorturl}}</td>
                  <td colspan="1">{{$link->visits}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div id="copy-msg" class="center-header">Click cell to copy contents to clipboard</div>
      @endif
    </div>
  </div>
  <div class="row" id="user-dash">
    <div class="col col-md-12">
      <!-- Shorten Form -->
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
          <form method="POST" action="/shorten/home" id="main-form">
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
      </div><!-- /.container -->
    </div>
  </div>
</div>

@endsection
