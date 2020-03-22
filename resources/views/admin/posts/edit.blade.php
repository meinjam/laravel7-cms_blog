@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Edit Post</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('update.post', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control" id="title">
            </div>
            <div class="form-group">
                <label for="category">Select a Category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach ($category as $item)
                    <option value="{{ $item->id }}" <?php if($item->id == $post->category_id) echo "selected" ?> >{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Post Image</label>
                <img src="{{asset($post->image)}}" alt="" class="img-fluid">
            </div>
            <div class="form-group">
                <label for="image">Select a new image</label>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="image">
                    <label class="custom-file-label" for="image">Choose file...</label>
                </div>
            </div>
            <div class="form-group">
                <label for="content">Post Description</label>
                <textarea name="content" class="form-control" id="content" rows="5">{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection