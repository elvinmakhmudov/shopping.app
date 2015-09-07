@extends('app')

@section('content')
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>title</th>
                    <th>parent_id</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>deleted_at</th>
                    <th>Products</th>
                    <th>edit</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->parent_id }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td>{{ $category->deleted_at }}</td>
                        <td><a href="{{ route('category.products.index', $category->id) }}">Products</a></td>
                        <td><a href="{{ route('category.edit', $category->id) }}">Edit</a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>

            <a href="{{ route('category.create') }}" class="btn btn-primary btn-raised">Add a category</a>
        </div>
    </div>
@endsection

