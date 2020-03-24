@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Update Tag</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('update.tag', $tag->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Tag Name</label>
                    <input type="text" name="tag" value="{{ $tag->tag }}" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection