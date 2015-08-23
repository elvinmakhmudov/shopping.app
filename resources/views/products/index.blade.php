@extends('app')

@section('content')

    <div class="container">
        @foreach($products as $product)
            @include('pages.partials.product')
        @endforeach
    </div>

@endsection