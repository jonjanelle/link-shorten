@extends('layouts.app')

@section('content')
<div class="container">

      <div class="row" id="user-dash">
          <div class="col-md-10 col-md-offset-1">
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
                          <th>Url</th>
                          <th>Short Url</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($links as $link)
                          <tr>
                            <td>{{$link->url}}</td>
                            <td>{{env('APP_URL', 'localhost')}}/{{$link->shorturl}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>

      </div>
      @include('forms.shorten')


@endsection
