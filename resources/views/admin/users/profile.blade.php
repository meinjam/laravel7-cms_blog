@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Edit your profile</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{ $user->email }}" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" id="cpassword">
                </div>
                <div class="form-group">
                    <label for="avatar">Upload New Avatar</label>
                    <div class="custom-file">
                        <input type="file" name="avatar" class="custom-file-input" id="avatar">
                        <label class="custom-file-label" for="avatar">Choose file...</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" value="{{ $user->profile['facebook'] }}" class="form-control" id="facebook">
                </div>
                <div class="form-group">
                    <label for="linkedin">Linkedin</label>
                    <input type="text" name="linkedin"value="{{ $user->profile['linkedin'] }}"  class="form-control" id="linkedin">
                </div>
                <div class="form-group">
                    <label for="instagram">Instagram</label>
                    <input type="text" name="instagram"value="{{ $user->profile['instagram'] }}"  class="form-control" id="instagram">
                </div>
                <div class="form-group">
                    <label for="about">About You</label>
                    <textarea name="about" id="about" class="form-control" rows="4">{{ $user->profile['about'] }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection