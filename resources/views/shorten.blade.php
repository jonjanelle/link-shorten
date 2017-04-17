@extends('layouts.app')

@section('content')
  @isset ($error)
    <div class="alert alert-danger feedback-box" id="error-box">
      <button type="button" class="close" data-target="#incorrectAns" data-dismiss="alert">
        <span aria-hidden="true">X</span>
      </button>
      {{$error}}
    </div>
  @endisset

  @include('forms.shorten')
@endsection
