@extends('layouts.app')
@section('content')
@if (count($tags) > 0)
    <h2 class="text-center">All Tags</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="table-secondary">
                <th>#</th>
                <th>Tags name</th>
                <th>Editing</th>
                <th>Deleting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->tag }}</td>
                <td><a href="{{ route('edit.tag', $item->id) }}" class="btn btn-secondary">Edit</a></td>
                <td><a href="{{ route('delete.tag', $item->id) }}" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tags->links() }}
@else
    <h1 class="">No Tags found. <a href="{{ route('create.tag') }}">Add</a> a tag now?</h1>
@endif
@endsection
