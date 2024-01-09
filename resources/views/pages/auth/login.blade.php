@extends('layout.layout')
@section('content')
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter email">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password" placeholder="Enter password">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection
