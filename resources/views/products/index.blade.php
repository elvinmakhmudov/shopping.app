@extends('app')

@section('content')

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>name</th>
                <th style="width: 265px;">description</th>
                <th>rating</th>
                <th>price</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>deleted_at</th>
                <th>Reviews</th>
                <th>Pictures</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>

            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->rating }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>{{ $product->deleted_at }}</td>
                    <td><a href="{{ route('category.products.index', $product->id) }}">Reviews</a></td>
                    <td>
                        <a href="{{ route('category.products.pictures.index', [$category->id, $product->id]) }}">Pictures</a>
                    </td>
                    <td><a href="{{ route('category.products.edit', [$category->id, $product->id]) }}">Edit</a></td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>

    <a href="{{ route('category.products.create', $category->id) }}" class="btn btn-primary btn-raised">Add a
        product</a>
@endsection