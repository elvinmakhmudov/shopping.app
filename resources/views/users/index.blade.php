@extends('app')

@section('content')
    <div class="col-lg-12">
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>Id</th>
                <th>name</th>
                <th>last_name</th>
                <th>email</th>
                <th>is_admin</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>deleted_at</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>{{ $user->deleted_at }}</td>
                    <td><a href="{{ route('users.edit', $user->id) }}">Edit</a></td>
                </tr>

            @endforeach

            </tbody>
        </table>

        <a href="{{ route('users.create') }}" class="btn btn-primary btn-raised">Add a user</a>
    </div>
@endsection
