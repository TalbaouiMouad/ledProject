@extends('layouts.app')

@section('content')
<div class="lbody">
    <div class="lcontainer">
    <div class="lform">
    <h2>Register </h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="inputBox">
            <input type="text" placeholder="Name" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
        </div>
        <div class="inputBox">
            <input type="email" placeholder="Email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
        </div>
        <div class="inputBox">
            <input type="password" placeholder="Password"class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="inputBox">
            <input type="password" placeholder="Confirm password"name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="inputBox">
            <input type="submit" value={{ __('Register') }}>
        </div>
        
        
    </form>
    </div>
    </div>
    </div>
@endsection

