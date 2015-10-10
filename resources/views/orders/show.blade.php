@extends('app')

@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th scope="row">Order's Id</th>
                <td>{{ $order->id }}</td>
            </tr>
            <tr>
                <th scope="row">Buyer's name</th>
                <td>{{ $order->name }}</td>
            </tr>
            <tr>
                <th scope="row">Buyer's Last Name</th>
                <td>{{ $order->last_name }}</td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td>{{ $order->email }}</td>
            </tr>
            <tr>
                <th scope="row">Telephone</th>
                <td>{{ $order->telephone }}</td>
            </tr>
            <tr>
                <th scope="row">Address</th>
                <td>{{ $order->address }}</td>
            </tr>
            <tr>
                <th scope="row">Message</th>
                <td>{{ $order->message }}</td>
            </tr>
            <tr>
                <th scope="row">Product</th>
                <td>
                    <a href="{{ route('category.products.show', [ $order->product->categories()->first()->slug, $order->product->id]) }}">{{ $order->product->name }}</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
