@extends('app')

@section('content')

    <div class="row col-md-offset-1 col-sm-offset-1 col-xs-offset-1">

        @include('admin.partials.sidebar')

        <div class="row col-md-7">
            <div class="panel panel-primary">
                <div class="panel-heading">Panel heading</div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
        </div>
    </div>

@endsection