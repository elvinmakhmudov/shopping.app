@extends('app')


@section('content')
    <div class="col-lg-12">
        @if(count($orders) > 0)
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Bought date</th>
                </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)
                    <tr>
                        <td>
                            <a href="{{ route('category.products.show', [ $order->product->categories()->first()->slug, $order->product->id]) }}">{{ $order->product->name }}</a>
                        </td>
                        <td>{{ $order->created_at }}</td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        @else
            <h2>You haven't bought any product yet</h2>
        @endif
    </div>
@endsection

