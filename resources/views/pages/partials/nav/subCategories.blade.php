{{--@if(count($category->children) > 0)--}}
{{--@foreach($category->children as $category)--}}
{{--<div class="sub-menu menu-item">--}}
{{--@include('pages.partials.nav.subCategories', $category)--}}
{{--<a class="list-group-item" href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--@endif--}}
@if(count($category->children) > 0)
    <ul class="sub-menu-item list-group">
        @foreach($category->children as $category)
            <li>
                <a class="list-group-item" href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
                @include('pages.partials.nav.subCategories', $category)
            </li>
        @endforeach
    </ul>
@endif
