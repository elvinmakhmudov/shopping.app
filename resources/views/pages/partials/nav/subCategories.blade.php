	@foreach($category->children as $category)
        @if(count($category->children) > 0)
			<li class="parent">
	            <a href="{{ route('category.show', $category->slug) }}"> {{ $category->title }} <span class="caret-right"></span></a>
            </li>
	            @include('pages.partials.nav.subCategories', $category)
        @else
        	<div class="subcategory2">
	            <a href="{{ route('category.show', $category->slug) }}"> {{ $category->title }}</a>
			</div>
            <div class="subcategory3">
                <a href="{{ route('category.show', $category->slug) }}"> {{ $category->title }}</a>
            </div>
        @endif
	@endforeach
