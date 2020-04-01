@extends('layouts.app')
@section('content')
@if (count($users) > 0)
    <h2 class="text-center">All Users</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="table-secondary">
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Permissions</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ asset($user->profile['avatar']) }}" height="70" alt="{{ $user->name }}"></td>
                {{-- <td>{{ $user->profile['avatar'] }}</td> --}}
                <td>{{ $user->name }}</td>
                <td>
                    @if ($user->admin)
                        <a href="{{ route('remove.admin', $user->id) }}" class="btn btn-danger">Remove Admin</a>
                    @else
                        <a href="{{ route('make.admin', $user->id) }}" class="btn btn-success">Make Admin</a>
                    @endif
                </td>
                <td>
                    @if (Auth::id() !== $user->id)
                        <a href="{{ route('delete.user', $user->id) }}" class="btn btn-danger">Delete</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h1 class="">No users available.</h1>
@endif
@endsection