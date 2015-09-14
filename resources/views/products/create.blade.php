@extends('app')

@section('content')
    <div class="col-lg-12">
        <form class="form-horizontal" action="{{ route('category.products.store', $category->id) }}" method="post"
              enctype="multipart/form-data">
            <fieldset>
                <legend>Add a product</legend>
                <div class="form-group">
                    <label for="inputName" class="col-lg-2 control-label">Name</label>

                    <div class="col-lg-10">
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDescription" class="col-lg-2 control-label">Description</label>

                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="inputDescription"
                                  name="description" placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rating" class="col-lg-2 control-label">Rating</label>

                    <div class="col-lg-10">
                        <input type="number" name="rating" class="form-control" id="rating" placeholder="Rating"
                               max="5">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-lg-2 control-label">Price</label>

                    <div class="col-lg-10">
                        <input type="number" step="any" name="price" class="form-control" id="price"
                               placeholder="Price">
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
    </div>
@endsection
