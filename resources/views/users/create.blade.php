@extends('base')
@section('title', 'Create User')

@section('content')
    <x-nav />
    <form action="{{ route('users.store') }}" method="post" class="custom-form">
        @csrf
        <h3 class="text-center p-2">Create User</h3>
        <div class="row mb-3">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="username" id="username" required>
                @if ($errors->has('username'))
                    <p class="text-danger">{{ $errors->first('username') }}</p>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="mobile" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control" name="mobile" id="mobile" required>
                @if ($errors->has('mobile'))
                    <p class="text-danger">{{ $errors->first('mobile') }}</p>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="lng" class="col-sm-2 col-form-label">Location</label>
            <div class="col-5">
                <input type="number" class="form-control" name="lng" id="lng" placeholder="lng">
                @if ($errors->has('lng'))
                    <p class="text-danger">{{ $errors->first('lng') }}</p>
                @endif
            </div>
            <div class="col-5">
                <input type="number" class="form-control" name="lat" id="lat" placeholder="lat">
                @if ($errors->has('lat'))
                    <p class="text-danger">{{ $errors->first('lat') }}</p>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-2" for="image" class="form-label">Image</label>
            <div class="col-10">
                <input class="form-control" type="file" id="image" name="image">
                @if ($errors->has('image'))
                    <p class="text-danger">{{ $errors->first('image') }}</p>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="roles" class="col-sm-2 col-form-label">Roles</label>
            <div class="col-sm-10">
                <select class="form-control" name="role" id="roles" required>
                    <option value="admin" @if (request()->role == 'admin') selected @endif>Admin</option>
                    <option value="user" @if (request()->role == 'user') selected @endif>User</option>
                    <option value="delivery" @if (request()->role == 'delivery') selected @endif>Delivery</option>
                </select>
                @if ($errors->has('role'))
                    <p class="text-danger">{{ $errors->first('role') }}</p>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" id="password" required>
                @if ($errors->has('password'))
                    <p class="text-danger">{{ $errors->first('password') }}</p>
                @endif
            </div>
        </div>
        <button id="submitBtn" type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
