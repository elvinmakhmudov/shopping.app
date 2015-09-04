<ul class="nav nav-tabs nav-stacked">
	@foreach($category->children as $category)
        @if(count($category->children) > 0)
			<li class="parent">
	            <a href="{{ route('category.show', $category->slug) }}"> {{ $category->title }} <span class="caret-right"></span></a>
            </li>
	            @include('pages.partials.nav.subCategories', $category)
        @else
        	<li>
	            <a href="{{ route('category.show', $category->slug) }}"> {{ $category->title }}</a>
			</li>
        @endif
	@endforeach
</ul>
