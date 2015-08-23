@extends('app')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>

                <div class="list-group categories">
                    @foreach($categories as $category)
                    @include('categories.category')
                @endforeach
                </div>
            </div>

            <div class="col-md-9">

                @include('pages.partials.slider')

                @foreach($categories as $category)

                    <div class="row">
                        <h2><a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a></h2>
                        @foreach($category->subcategories as $subcategory)
                            @if($subcategory->products->count() > 0)
                                <h4><a href="{{route('category.subcategory.show', [$category->slug, $subcategory->slug])}}">{{$subcategory->title}}</a></h4>
                                @foreach($subcategory->products as $product)
                                    @include('products.product', ['product' => $product])
                                @endforeach
                                <div class="clearfix"></div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection
