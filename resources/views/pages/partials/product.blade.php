<div class="col-lg-5 col-xs-12">
    <div class="thumbnail">
        <img src="http://placehold.it/150x100" class="img-rounded" alt="">
    </div>
    <ul class="list-inline row center-block">
        <li><a href=""><img src="http://placehold.it/100x100" class="img-rounded center-block" alt=""></a></li>
        <li><a href=""><img src="http://placehold.it/100x100" class="img-rounded center-block" alt=""></a></li>
        <li><a href=""><img src="http://placehold.it/100x100" class="img-rounded center-block" alt=""></a></li>
        <li><a href=""><img src="http://placehold.it/100x100" class="img-rounded center-block" alt=""></a></li>
    </ul>
</div>

<div class="col-md-6 col-lg-6">
    <h3>
        <a href="{{route('category.subcategory.products.show', [$product->subcategories->first()->category->slug, $product->subcategories->first()->slug, $product->id])}}">{{ $product->name }}</a>
    </h3>

    <div class="ratings">
        <h2>$24.99</h2>
        @for($i = 0; $i < floor($product->rating); $i++)
            <span class="glyphicon glyphicon-star"></span>
        @endfor
        {{ $product->reviews->count() }} reviews
    </div>

    <p>{{ $product->description }}</p>

</div>
