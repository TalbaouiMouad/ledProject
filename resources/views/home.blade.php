@extends('layouts.app')
@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
@section('content')
     <div id="card" products="{{$products}}">
     </div>
@endsection
