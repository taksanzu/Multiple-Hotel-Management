@extends('layout.layout')
@section('login')
    <div class="row" style="height: 100vh">
        <div class="col-lg-6" style="background: url('https://tiffanyhotel.com.vn/Upload/images/Slide/2.jpg') no-repeat; background-size: cover; ">
        </div>
        <div class="col-lg-6 p-5 align-self-lg-center" >
            <h1>Login</h1>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Enter email">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
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
