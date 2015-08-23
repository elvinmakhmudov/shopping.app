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
                    <h2>{{$category->title}}</h2>
                    @foreach($subcategories as $subcategory)
                        @if($subcategory->products->count() > 0)
                            <h4>{{$subcategory->title}}</h4>
                            @foreach($subcategory->products as $product)
                                @include('products.product')
                            @endforeach
                            <div class="clearfix"></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection
