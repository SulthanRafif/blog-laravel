@extends('dashboard.layouts.main')
@section('title')
HOME
@endsection
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if(session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
                @endif
                <div class="card mt-3">
                    <div class="card-header">
                        Selamat Datang di Blog Laravel
                    </div>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos earum facere exercitationem tempore, repudiandae maiores iure omnis impedit sed voluptate ipsum culpa animi, dolores consectetur ratione officia maxime vitae neque.</p>
                        <p>Quaerat quos alias ipsa dolorum magni, earum qui? Officia excepturi expedita, quidem minima quasi velit quos laboriosam minus. Repellat dicta corrupti minima praesentium suscipit dolorum voluptate tempore illo at sequi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection