@if($categories->count() > 0)

    @foreach($categories as $category)
        <div class="parent">
            @if(count($category->children) > 0)
                <a href="{{ route('category.show', $category->slug) }}"> {{ $category->title }} <span
                            class="caret-right"></span></a>
                @include('pages.partials.nav.subCategories', $category)
            @else
                <a href="{{ route('category.show', $category->slug) }}"> {{ $category->title }}</a>
            @endif
        </div>
    @endforeach
@endif
