@extends('app')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>

                <div class="categories">
                    @include('pages.partials.nav.categories')
                </div>
            </div>

            <div class="col-md-9">

                <div class="row">
                    <h2>{{$category->title}}</h2>

                    @include('pages.partials.categories.category', $category)

                    {{--@foreach($subcategories as $subcategory)--}}
                    {{--@if($subcategory->products->count() > 0)--}}
                    {{--<ol class="breadcrumb">--}}
                    {{--<li><a href="{{route('category.show', $category->slug)}}">{{ $category->title }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="active">{{ $subcategory->title}}</li>--}}
                    {{--</ol>--}}
                    {{--@foreach($subcategory->products as $product)--}}
                    {{--@include('products.product')--}}
                    {{--@endforeach--}}
                    {{--<div class="clearfix"></div>--}}
                    {{--@endif--}}
                    {{--@endforeach--}}
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection
