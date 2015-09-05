@if($categories->count() > 0)

    @foreach($categories as $category)
        @if(count($category->children) > 0)
            <div class="parent3">
                <a href="{{ route('category.show', $category->slug) }}"> {{ $category->title }} <span class="caret-right"></span></a> 
                @include('pages.partials.nav.subCategories', $category) 
            </div>
        @else
            <div>
                <a href="{{ route('category.show', $category->slug) }}"> {{ $category->title }}</a>
            </div>
        @endif
    @endforeach
@endif
