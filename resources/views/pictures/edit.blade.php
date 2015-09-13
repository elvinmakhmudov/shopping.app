@extends('app')

@section('content')
    <div class="container">

        <form class="form-horizontal"
              action="{{ route('category.products.pictures.update', [ $category->id, $product->id, $picture->id ]) }}"
              method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <fieldset>
                <legend>Edit a picture</legend>
                <div class="form-group">
                    <label for="selectParent" class="col-lg-2 control-label">Product</label>

                    <div class="col-lg-10">
                        <select class="form-control" name="newProductId" id="selectParent">
                            @if($category->products)
                                @foreach($category->products as $possibleProduct)
                                    @if($possibleProduct->id == $picture->product->id)
                                        <option value="{{ $possibleProduct->id }}"
                                                selected>{{ $possibleProduct->name }}</option>
                                    @else
                                        <option value="{{ $possibleProduct->id }}">{{ $possibleProduct->name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="productPicture" class="col-lg-2 control-label">Picture</label>

                    <div class="col-lg-10">
                        <input type="file" class="form-control" name="picture" id="productPicture"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit
                            <div class="ripple-wrapper"></div>
                        </button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            </fieldset>
        </form>
        <form class="form-horizontal"
              action="{{ route('category.products.pictures.destroy', [ $category->id, $product->id, $picture->id ]) }}"
              method="post">
            <fieldset>
                <legend>Delete a category</legend>
                <input type="hidden" name="_method" value="DELETE">

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-danger btn-raised">Delete
                            <div class="ripple-wrapper"></div>
                        </button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            </fieldset>
        </form>
    </div>
@endsection
