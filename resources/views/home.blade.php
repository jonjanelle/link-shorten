@extends('layouts.app')

@section('content')
<div class="container">
  <div class="panel panel-success">
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
              </tr>
            </thead>
            <tbody>
              @foreach ($links as $link)
                <tr>
                  <td colspan="3">{{$link->url}}</td>
                  <td colspan="3">{{env('APP_URL', 'localhost')}}/{{$link->shorturl}}</td>
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
      @include('forms.shorten')
    </div>
  </div>
</div>

@endsection
