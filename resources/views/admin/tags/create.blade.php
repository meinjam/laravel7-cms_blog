@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Create a New Tag</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.tag') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Tag Name</label>
                    <input type="text" name="tag" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection