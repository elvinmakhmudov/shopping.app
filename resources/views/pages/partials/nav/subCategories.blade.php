	@foreach($category->children as $category)
        @if(count($category->children) > 0)
			<li class="parent">
	            <a href="{{ route('category.show', $category->slug) }}"> {{ $category->title }} <span class="caret-right"></span></a>
            </li>
	            @include('pages.partials.nav.subCategories', $category)
        @else
        	<div class="subcategory-small">
	            <a href="{{ route('category.show', $category->slug) }}"> {{ $category->title }}</a>
			</div>
            <div class="subcategory">
                <a href="{{ route('category.show', $category->slug) }}"> {{ $category->title }}</a>
            </div>
        @endif
	@endforeach
