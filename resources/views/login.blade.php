@extends('base')
@section('title', 'Login')

@section('content')
    <form action="/login" method="post" class="custom-form">
        @csrf
        <h3 class="text-center p-2">Login</h3>
        <div class="row mb-3">
            <label for="inputPhone3" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control" name="mobile" id="mobile" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
        </div>
        <button id="submitBtn" type="submit" class="btn btn-primary">Sign in</button>
    </form>
@endsection
