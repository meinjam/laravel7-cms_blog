@extends('layouts.app')
@section('content')
@if (count($posts) > 0)
    <h2 class="text-center">Trashed Posts</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="table-secondary">
                <th>#</th>
                <th>Post Title</th>
                <th>Post Image</th>
                <th>Editing</th>
                <th>Restoring</th>
                <th>Deleting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td><img src="{{ asset($item->image) }}" height="60" alt="{{ $item->title }}"></td>
                <td><a href="{{ route('edit.post', $item->id) }}" class="btn btn-info">Edit</a></td>
                <td><a href="{{ route('post.restore', $item->id) }}" class="btn btn-success">Restore</a></td>
                {{-- <td><a href="{{ route('delete.kill', $item->id) }}" class="btn btn-danger">Delete</a></td> --}}
                <td>
                    <form action="{{ route('delete.kill', $item->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h2>No posts in trashed.</h2>
@endif
@endsection
