@extends('layouts.app')

@section('content')
<div class="container">

      <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
              <div class="panel-heading">Account Dashboard</div>
              <div class="panel-body">
                Welcome, {{Auth::user()->name}}!
              </div>
            </div>
          </div>
        </div>
      </div>
      @include('forms.shorten')


@endsection
