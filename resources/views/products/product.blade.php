<div class="col-lg-5">
    <div class="thumbnail">
        <img src="{{ asset('images/'.$category->slug.'/'.$product->thumbnail) }}" alt="">
    </div>
    @if($pictures)
        <div class="list-inline row center-block subImages">
            @foreach($pictures as $picture)
                <img src="{{ asset('images/'.$category->slug.'/'.$product->id.'/'.$picture->filename) }}" >
            @endforeach
        </div>
    @endif
</div>

<div class="col-md-6 col-lg-6">
    <ol class="breadcrumb">
        <li><a href="{{route('category.show', $category->slug)}}">{{ $category->title }}</a></li>
        <li class="active">{{ $category->title}}</li>
    </ol>
    <h3>
        <a href="{{route('category.products.show', [$product->categories->first()->slug, $product->id])}}">{{ $product->name }}</a>
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
