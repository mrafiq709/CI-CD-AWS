@extends('layouts.auth')
@section('content')
<div class="kt-login__signin">
    <div class="kt-login__head">
        <h3 class="kt-login__title" style="text-transform: capitalize">Login Admin</h3>
    </div>
    <form method="POST" class="kt-form">
        @csrf
        <div class="form-group">
            <input class="form-control" type="email" placeholder="Enter email" name="email" id="email" value="" required
                autocomplete="email" autofocus>
        </div>
        <div class="form-group">
            <input class="form-control" type="password" placeholder="Enter password" name="password" id="password"
                required autocomplete="current-password">
        </div>
        <div class="row kt-login__extra">
            <div class="col">
                <label class="kt-checkbox">
                    <input type="checkbox" name="remember" name="remember" id="remember">Save password
                    <span></span>
                </label>
            </div>
            <div class="col kt-align-right">
                <a href="{{ route('password.reset') }}" class="kt-login__link">Forgot password</a>
            </div>
        </div>
        <div class="kt-login__actions">
            <button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Login</button>
        </div>
    </form>
</div>
@endsection