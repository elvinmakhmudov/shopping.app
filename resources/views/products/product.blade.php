<div class="thumbnail center-block">
{{--    {{ dd($product) }}--}}

    @if(file_exists(public_path().'/content/images/'.$product->categories->first()->slug.'/'.$product->thumbnail))
        <img src="{{ asset('/content/images/'.$product->categories->first()->slug.'/'.$product->thumbnail) }}"
             alt="">
    @else
        <img src="{{ asset('/content/default/product_thumbnail.png') }}"
             alt="">
    @endif
</div>
@if(count($product->pictures) > 0)
    <div class="list-inline row center-block subImages">
        @foreach($product->pictures as $picture)
            <div class="subImage">
                <img src="{{ asset('/content/images/'.$product->categories->first()->slug.'/'.$product->id.'/'.$picture->filename) }}">
            </div>
        @endforeach
    </div>
@endif

