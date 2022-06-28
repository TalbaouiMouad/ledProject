
@extends('layouts.app')
@section('content')
<div class='disFlex'>
    <div id="sidebar" >
    </div>
    <div id=" dashboard_content" class="container">
        @yield('pages')
    </div>
</div>
@endsection