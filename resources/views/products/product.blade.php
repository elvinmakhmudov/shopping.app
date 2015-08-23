<div class="col-sm-4 col-lg-3 col-md-3">
    <div class="thumbnail">
        <img src="http://placehold.it/150x100" class="img-rounded" alt="">

        <div class="caption">
            <h4 class="pull-right">$24.99</h4>
            <h4><a href="{{route('category.subcategory.products.show', [$product->subcategories->first()->category->slug, $product->subcategories->first()->slug, $product->id])}}">{{ $product->name }}</a>
            </h4>

            <p>{{ $product->description }}</p>
        </div>
        <div class="ratings">
            <p class="pull-right">{{ $product->reviews->count() }} reviews</p>

            <p>
                @for($i = 0; $i < floor($product->rating); $i++)
                    <span class="glyphicon glyphicon-star"></span>
                @endfor
            </p>
        </div>
    </div>
</div>
