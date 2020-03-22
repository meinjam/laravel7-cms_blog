@extends('layouts.app')
@section('content')
@if (count($categories) > 0)
    <h2 class="text-center">All Categories</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="table-secondary">
                <th>#</th>
                <th>Category name</th>
                <th>Editing</th>
                <th>Deleting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td><a href="{{ route('category.edit', $item->id) }}" class="btn btn-secondary">Edit</a></td>
                <td>
                    <form action="{{ route('category.destroy', $item->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
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
    <h1 class="">No category found. <a href="{{ route('category.create') }}">Add</a> a category now?</h1>
@endif
@endsection
