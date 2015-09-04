@foreach($categories as $category)

    <div class="row">
        @foreach($category->children as $category)
            @include('pages.partials.categories.category', $category)
        @endforeach
    </div>
@endforeach
