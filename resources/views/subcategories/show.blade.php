@extends('app')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>

                <div class="list-group categories">
                    @include('categories.category')
                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <ol class="breadcrumb">
                        <li><a href="{{route('category.show', $category->slug)}}">{{ $category->title }}</a></li>
                        <li class="active">{{ $subcategory->title}}</li>
                    </ol>
                    @foreach($products as $product)
                        @include('products.product')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection
