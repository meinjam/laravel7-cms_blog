@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Edit log Settings</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('settings.update') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Website Name</label>
                    <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="Number">Website Phone</label>
                    <input type="text" name="contact_number" value="{{ $settings->contact_number }}" class="form-control" id="Number">
                </div>
                <div class="form-group">
                    <label for="email">Website Email</label>
                    <input type="text" name="contact_email" value="{{ $settings->contact_email }}" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="{{ $settings->address }}" class="form-control" id="address">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update Details</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection