@extends('dashboard.layouts.main')
@section('title')
DASHBOARD
@endsection
@section('container')
    @if(session()->has('success'))
        <div class="alert alert-success  mt-3" role="alert">{{ session()->get('success') }}</div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back, {{Auth::user()->name}}</h1>
    </div>
@endsection