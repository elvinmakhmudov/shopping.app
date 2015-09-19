@extends('app')

@section('content')

@include('products.product', ['category' => $category, 'product' => $product])

@endsection
