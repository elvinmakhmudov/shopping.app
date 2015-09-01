<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <img src="http://placehold.it/150x100" class="img" alt="">
        <span class="card-title">Card Title</span>

        <div class="caption">
            <h4>
                <a href="{{route('category.products.show', [$product->categories->first()->slug, $product->id])}}">{{ $product->name }}</a>
            </h4>
        </div>
        <div class="ratings">
            <p class="pull-right">{{ count($product->reviews) }} reviews</p>
            <p>
                @for($i = 0; $i < floor($product->rating); $i++)
                    <span class="glyphicon glyphicon-star"></span>
                @endfor
            </p>
        </div>
    </div>
</div>

