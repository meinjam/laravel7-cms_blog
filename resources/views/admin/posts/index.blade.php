@extends('layouts.app')
@section('content')
@if (count($posts) > 0)
    <h2 class="text-center">All Posts</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="table-secondary">
                <th>#</th>
                <th>Post Title</th>
                <th>Post Image</th>
                <th>Category</th>
                <th>Editing</th>
                <th>Deleting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td><img src="{{ asset($item->image) }}" height="60" alt="{{ $item->title }}"></td>
                <td>{{ $item->category['name'] }}</td>
                <td><a href="{{ route('edit.post', $item->id) }}" class="btn btn-info">Edit</a></td>
                <td>
                    <a href="{{ route('delete.post', $item->id) }}" class="btn btn-danger">Trash</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h1 class="">No posts available. <a href="{{ route('create.post') }}">Add</a> a post now?</h1>
@endif
@endsection
