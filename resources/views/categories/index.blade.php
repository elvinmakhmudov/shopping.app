@extends('admin.layouts.main')

@section('content')

    @foreach($categories as $category)

        {{$category}}

    @endforeach

@endsection

