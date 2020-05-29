@extends('layouts.layout')

@section('main')
    <div class="container">
        <form method="POST" action="{{ route('password.update') }}" class="reset-form">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <label for="password-reset-email" >E-Mail Address</label>
            <input id="password-reset-email" type="email"  name="password-reset-email" style="@error('register_email') border-color:red; @enderror" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            @error('password-reset-email')
            <p class="help_block">
                {{$message}}
            </p>
            @enderror


            <label for="password-reset" >Password</label>
            <input id="password-reset" type="password"  style="@error('register_email') border-color:red; @enderror" name="password-reset" required autocomplete="new-password">
            @error('password-reset')
            <p class="help_block">
                {{$message}}
            </p>
            @enderror

            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password-reset_confirmation" required autocomplete="new-password">

            <button type="submit" class="button2">
                Reset Password
            </button>

        </form>
    </div>
@endsection
