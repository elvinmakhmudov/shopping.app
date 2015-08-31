<h4>
    <a href="{{route('category.show', [$category->slug])}}">{{$category->title}}</a>
</h4>
@foreach($category->products as $product)
    @include('products.product', ['product' => $product])
@endforeach
<div class="clearfix"></div>
@if(count($category->children) > 0 )
    @foreach($category->children as $category)
        @include('pages.partials.categories.category', $category->children)
    @endforeach
@endif
