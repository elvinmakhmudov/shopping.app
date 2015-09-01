@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            @include('products.product', ['category' => $category, 'product' => $product])
        </div>
    </div>

@endsection
