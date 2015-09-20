@extends('app')

@section('content')
    <!-- Page Content -->
    <div class="col-md-3 col-lg-3 col-sm-12">
        <div class="categories">
            @include('pages.partials.nav.categories')
        </div>
    </div>

    <div class="col-md-9 col-lg-9 col-sm-12">
        @include('pages.partials.slider')
    </div>

{{--    @include('pages.partials.categories.categories', $categories)--}}
    @include('pages.partials.categories.category', ['category' => $mainPageCategory])
    <!-- /.container -->
@endsection
