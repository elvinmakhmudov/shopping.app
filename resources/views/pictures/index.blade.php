@extends('app')

@section('content')

    <div class="container">
        <div class="col-lg-10 col-md-10">
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>product_id</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>deleted_at</th>
                    <th>edit</th>
                </tr>
                </thead>
                <tbody>

                @if(isset($pictures))
                    @foreach($pictures as $picture)
                        <tr>
                            <td>{{ $picture->id }}</td>
                            <td>
                                <a href="{{ asset('images/'.$category->slug.'/'.$product->id.'/'.$picture->filename) }}">{{ $picture->filename }}</a>
                            </td>
                            <td>{{ $picture->product_id }}</td>
                            <td>{{ $picture->created_at }}</td>
                            <td>{{ $picture->updated_at }}</td>
                            <td>{{ $picture->deleted_at }}</td>
                            <td>
                                <a href="{{ route('category.products.pictures.edit', [$category->id, $product->id, $picture->id]) }}">Edit</a>
                            </td>
                        </tr>

                    @endforeach
                @endif

                </tbody>
            </table>

            <a href="{{ route('category.products.pictures.create', [$category->id, $product->id]) }}"
               class="btn btn-primary btn-raised">Add a picture</a>
        </div>
    </div>
@endsection
