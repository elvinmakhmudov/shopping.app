@if($categories->count() > 0)
    <ul class="menu-item list-group">
        @foreach($categories as $category)
            {{--<!-- <div class="menu-item">--}}
            {{--<a href="{{ route('category.show', $category->slug) }}" class="list-group-item"> {{ $category->title }}</a>--}}
            {{--@include('pages.partials.nav.subCategories', $category)--}}
            {{--</div>--}}
            {{---->--}}
            <li>
                <a class="list-group-item" href="{{ route('category.show', $category->slug) }}"> {{ $category->title }}</a>
                @include('pages.partials.nav.subCategories', $category)
            </li>
        @endforeach
    </ul>
@endif
