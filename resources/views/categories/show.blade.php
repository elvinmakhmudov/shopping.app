@extends('app')

@section('content')
    <div class="col-md-3">
        <div class="categories">
            @include('pages.partials.nav.categories')
        </div>

        @if(isset($category->children))
            <div class="categories">
                @include('pages.partials.nav.subCategories', $category->children)
            </div>
        @endif

    </div>

    <div class="col-md-9">

        <div class="row">
            <h4 class="page-title">{{$category->title}}</h4>
            @include('pages.partials.categories.category', $category)
        </div>
    </div>
@endsection
