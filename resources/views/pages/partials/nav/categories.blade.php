@if($categories->count() > 0)

<ul class="nav nav-tabs nav-stacked">
    @foreach($categories as $category)
        @if(count($category->children) > 0)
            <li class="parent">
                <a href="{{ route('category.show', $category->slug) }}"> {{ $category->title }} <span class="caret-right"></span></a> 
                @include('pages.partials.nav.subCategories', $category) 
            </li>
        @else
            <li>
                <a href="{{ route('category.show', $category->slug) }}"> {{ $category->title }}</a>
            </li>
        @endif
    @endforeach
</ul>
@endif
