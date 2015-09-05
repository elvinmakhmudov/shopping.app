@foreach($categories as $category)

    @foreach($category->children as $category)
        @include('pages.partials.categories.category', $category)
    @endforeach
@endforeach
