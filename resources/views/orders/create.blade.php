@extends('app')

@section('content')

    <div class="col-lg-8">

        <form class="form-horizontal" action="{{ route('category.store') }}" method="post">
            <fieldset>
                <legend>Buy a product</legend>
                @include('partials.error')
                <div class="form-group">
                    <label for="inputTitle" class="col-lg-2 control-label">Title</label>

                    <div class="col-lg-10">
                        <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Title">
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
    <div class="col-lg-4">
        @include('products.product', $product)

    </div>


@endsection
