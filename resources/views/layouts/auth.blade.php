@extends('layouts.app')
@section('styles')
    <link href="{{ asset('assets/css/pages/login/login-3.css') }}" rel="stylesheet" type="text/css" />
    @yield('styles_page')
@endsection
@section('body')
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{ asset('assets/media/bg/bg-3.jpg') }});">
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                    <div class="kt-login__container">
                        <div class="kt-login__logo">
                            <a href="/">
                                <img src="{{ asset('assets/media/logos/logo-light.png') }}">
                            </a>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!--begin::Page Scripts(used by this page) -->
    @yield('scripts_page')
@endsection
