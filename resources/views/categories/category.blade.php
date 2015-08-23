<div class="menu-item">
    <a href="{{route('category.show', $category->slug)}}"
       class="list-group-item">{{$category->title}}</a>

    <div class="sub-menu">
        @if($category->subcategories)
            @foreach($category->subcategories as $subcategory)
                <a class="list-group-item"
                   href="{{route('category.subcategory.show', [$category->slug, $subcategory->slug])}}">{{$subcategory->title}}</a>
            @endforeach
        @endif
    </div>
</div>
