@extends('app')

@section('content')

    <div class="col-lg-5 col-md-5">
        @include('products.product', ['category' => $category, 'product' => $product])
    </div>

    <div class="col-md-7 col-lg-7">
        <ol class="breadcrumb">
            <li><a href="{{route('category.show', $category->slug)}}">{{ $category->title }}</a></li>
            <li class="active">{{ $category->title}}</li>
        </ol>
        <h3>
            <a href="{{route('category.products.show', [$product->categories->first()->slug, $product->id])}}">{{ $product->name }}</a>
        </h3>

        <a href="{{ route('orders.create', ['productId' => $product->id]) }}"
           class="btn btn-success btn-raised">Buy</a>

        <div class="ratings">
            <h2>{{ $product->price }}$</h2>
            @for($i = 0; $i < floor($product->rating); $i++)
                <span class="glyphicon glyphicon-star"></span>
            @endfor
            {{ $product->reviews->count() }} reviews
        </div>

        <p>{{ $product->description }}</p>
    </div>

@endsection
