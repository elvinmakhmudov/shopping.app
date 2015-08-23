@extends('app')

@section('content')

    @foreach($categories as $category)

        {{$category}}

    @endforeach

@endsection

