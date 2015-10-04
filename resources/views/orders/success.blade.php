@extends('app')

@section('content')
    <div class="col-lg-12 text-center">
        <h2>You have successfully bought
            <a href="{{route('category.products.show', [$product->categories->first()->slug, $product->id])}}">{{ $product->name }}</a>
        </h2>

        <h3>We will contact you as soon as possible.</h3>

        @if(isset($user))
            <h3>Show all your <a href="{{ route('orders.index') }}">orders</a></h3>
        @endif
    </div>
@endsection
