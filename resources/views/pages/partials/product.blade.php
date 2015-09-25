<div class="col-sm-4 col-lg-3 col-md-3 product">
    <div class="card2">
        <div class="card-image2">
            <a
                    href="{{route('category.products.show', [$product->categories->first()->slug, $product->id])}}">
                @if(file_exists(public_path().'/content/images/'.$product->categories->first()->slug.'/'.$product->thumbnail))
                    <img src="{{ asset('/content/images/'.$product->categories->first()->slug.'/'.$product->thumbnail) }}"
                         alt="">
                @else
                    <img src="{{ asset('/content/default/product_thumbnail.png') }}"
                         alt="">
                @endif
            </a>
        </div>

        <div class="caption">
            <h4>
                <a class="card-title"
                   href="{{route('category.products.show', [$product->categories->first()->slug, $product->id])}}">{{ $product->name }}</a>
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

