@foreach($categories as $category)

    <div class="row">
        <h2><a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a></h2>

        @foreach($category->children as $category)
            @include('pages.partials.categories.category', $category)
        @endforeach
    </div>
@endforeach
