@extends('layout.layout')
@section('login')
    <div class="row">
        <div class="col-md-6" style="background-image: url('https://tiffanyhotel.com.vn/Upload/images/Slide/2.jpg'); height: 100vh">
        </div>
        <div class="col-md-6 p-5" style="align-self: center">
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
        </div>
    </div>
@endsection
