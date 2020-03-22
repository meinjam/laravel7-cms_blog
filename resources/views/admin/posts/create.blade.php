@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Create a New Post</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="form-group">
                <label for="category">Select a Category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Post Image</label>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="image">
                    <label class="custom-file-label" for="image">Choose file...</label>
                </div>
            </div>
            <div class="form-group">
                <label for="content">Post Description</label>
                <textarea name="content" class="form-control" id="content" rows="5"></textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection