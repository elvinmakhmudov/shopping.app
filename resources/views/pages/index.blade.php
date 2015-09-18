@extends('app')

@section('content')
    <!-- Page Content -->
    <div class="col-md-3">
        <div class="categories">
            @include('pages.partials.nav.categories')
        </div>
    </div>

    <div class="col-md-9">
        @include('pages.partials.slider')
    </div>

{{--    @include('pages.partials.categories.categories', $categories)--}}
    @include('pages.partials.categories.category', ['category' => $mainPageCategory])
    <!-- /.container -->
@endsection
