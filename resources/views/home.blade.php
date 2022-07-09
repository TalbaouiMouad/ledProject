@extends('layouts.app')
@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
@section('content')
    <div id="slider">
    </div>
    <div id="card" products="{{$products}}">
    </div>
@endsection
