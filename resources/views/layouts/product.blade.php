@extends('layouts.app')
@section('content')
<div id="showproduct" products="{{$products}}"></div>
<div>
    <form method="POST" action="">
        @csrf
        <div >
            <input  type="email" class="form-control" name="email" value="1" required hidden>
        </div>
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
</div>
<div id="carousel" products="{{$products}}">
</div>
@endsection