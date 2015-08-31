<div class="col-lg-5 col-xs-12">
    <div class="thumbnail">
        <img src="http://placehold.it/150x100" class="img" alt="">
    </div>
    <ul class="list-inline row center-block">
        <li><a href=""><img src="http://placehold.it/100x100" class="img center-block" alt=""></a></li>
        <li><a href=""><img src="http://placehold.it/100x100" class="img center-block" alt=""></a></li>
        <li><a href=""><img src="http://placehold.it/100x100" class="img center-block" alt=""></a></li>
        <li><a href=""><img src="http://placehold.it/100x100" class="img center-block" alt=""></a></li>
    </ul>
</div>

<div class="col-md-6 col-lg-6">
    <ol class="breadcrumb">
        <li><a href="{{route('category.show', $category->slug)}}">{{ $category->title }}</a></li>
        <li class="active">{{ $category->title}}</li>
    </ol>
    <h3>
        <a href="{{route('category.products.show', [$product->category->slug, $product->subcategories->first()->slug, $product->id])}}">{{ $product->name }}</a>
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
