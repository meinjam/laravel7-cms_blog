@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Update Category</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update', $cate->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Category Name</label>
                    <input type="text" name="name" value="{{ $cate->name }}" class="form-control" id="title">
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