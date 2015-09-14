@extends('app')

@section('content')

    <div class="col-lg-3 col-md-3 col-sm-4">
        @include('admin.partials.sidebar')
    </div>

    <div class="col-md-9 col-lg-9 col-sm-8">
        <div class="panel panel-primary">
            <div class="panel-heading">Panel heading</div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
    </div>

@endsection