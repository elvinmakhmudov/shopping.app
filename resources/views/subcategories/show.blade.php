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
                        <h1>{{$category->title}}</h1>
                        <h2>{{$subcategory->title}}</h2>
                            @foreach($products as $product)
                                @include('products.product')
                            @endforeach
                    </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection
