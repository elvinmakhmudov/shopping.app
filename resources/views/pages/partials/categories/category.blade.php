@foreach($category->products as $product)
    @include('pages.partials.product', ['product' => $product])
@endforeach
<div class="clearfix"></div>
@if(count($category->children) > 0 )
    @foreach($category->children as $category)
        @include('pages.partials.categories.category', $category->children)
    @endforeach
@endif
