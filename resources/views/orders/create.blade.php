@extends('app')

@section('content')

    <div class="col-lg-8">

        <form class="form-horizontal" action="{{ route('users.orders.store') }}" method="post">
            <fieldset>
                <legend>Buy a product</legend>
                @include('partials.error')
                <div class="form-group">
                    <label for="inputName" class="col-lg-2 control-label">Name</label>

                    <div class="col-lg-10">
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputLastName" class="col-lg-2 control-label">Last name</label>

                    <div class="col-lg-10">
                        <input type="text" name="last_name" class="form-control" id="inputLastName"
                               placeholder="Last name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Email</label>

                    <div class="col-lg-10">
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNumber" class="col-lg-2 control-label">Telephone</label>

                    <div class="col-lg-10">
                        <input type="text" name="telephone" class="form-control" id="inputNumber"
                               placeholder="Telephone number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress" class="col-lg-2 control-label">Address</label>

                    <div class="col-lg-10">
                        <input type="text" name="address" class="form-control" id="inputNumber"
                               placeholder="Shipping Address">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputMessage" class="col-lg-2 control-label">Message</label>

                    <div class="col-lg-10">
                        <input type="text" name="message" class="form-control" id="inputMessage"
                               placeholder="Additional message">
                    </div>
                </div>
                <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Order
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
