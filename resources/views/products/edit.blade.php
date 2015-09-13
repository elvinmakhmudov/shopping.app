@extends('app')

@section('content')
    <div class="container">

        <form class="form-horizontal"
              action="{{ route('category.products.update', [ $category->id, $product->id ]) }}"
              method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <fieldset>
                <legend>Edit a product</legend>
                <div class="form-group">
                    <label for="inputName" class="col-lg-2 control-label">Name</label>

                    <div class="col-lg-10">
                        <input type="text" name="name" class="form-control" id="inputName"
                               value="{{ $product->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDescription" class="col-lg-2 control-label">Description</label>

                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="inputDescription"
                                  name="description" >{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rating" class="col-lg-2 control-label">Rating</label>

                    <div class="col-lg-10">
                        <input type="number" name="rating" class="form-control" id="rating"
                               value="{{ $product->rating }}" max="5">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-lg-2 control-label">Price</label>

                    <div class="col-lg-10">
                        <input type="number" step="any" name="price" class="form-control" id="price"
                               value="{{ $product->price }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="selectParent" class="col-lg-2 control-label">Category</label>

                    <div class="col-lg-10">
                        <select class="form-control" name="newCategoryId" id="selectParent">
                            @foreach($categories as $possibleCategory)
                                @if($possibleCategory->id == $product->categories()->first()->id)
                                    <option value="{{ $possibleCategory->id }}"
                                            selected>{{ $possibleCategory->title }}</option>
                                @else
                                    <option value="{{ $possibleCategory->id }}">{{ $possibleCategory->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="productThumbnail" class="col-lg-2 control-label">Thumbnail</label>

                    <div class="col-lg-10">
                        <input type="file" class="form-control" name="thumbnail" id="productThumbnail"/>
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
              action="{{ route('category.products.destroy', [ 'categoryId' => $category->id, 'productId' => $product->id ]) }}"
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
