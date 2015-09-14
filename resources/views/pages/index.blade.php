@extends('app')

@section('content')
    <!-- Page Content -->
    <div class="col-md-3">
        <div class="categories">
            @include('pages.partials.nav.categories', $categories)
        </div>
    </div>

    <div class="col-md-9">
        @include('pages.partials.slider')
    </div>

    @include('pages.partials.categories.categories', $categories)
    <!-- /.container -->
@endsection
