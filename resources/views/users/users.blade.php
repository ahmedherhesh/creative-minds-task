@extends('base')
@section('content')
    <x-nav />
    <div class="container">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
        <table class="table table-stripedm-auto text-center">
            <tr>
                <th>ID</th>
                <th>USERNAME</th>
                <th>PHONE</th>
                <th>ROLE</th>
                <th>image</th>
                <th>CONTROLLERS</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><a class="text-decoration-none" href="{{ route('users.show', $user->id) }}">{{ $user->username }}</a>
                    </td>
                    <td>{{ $user->mobile }}</td>
                    <td>{{ $user->role }}</td>
                    <td><img class="rounded" src="{{ $user->image }}" alt="" width="50"></td>
                    <td class="d-flex gap-2 justify-content-center">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">DELETE</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
