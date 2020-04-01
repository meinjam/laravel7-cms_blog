@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Create a New User</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.user') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection