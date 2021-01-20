@extends('layouts.admin')
@section('page_title', "Admin")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    View screen login <a href="{{ url('login') }}">here</a>	
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
