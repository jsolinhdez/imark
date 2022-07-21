@extends('frontend.layouts.master')

@section('content')

    <div class="login-area page-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 border p-4">
                    <form action="{{route('login.submit')}}" method="POST">
                        @csrf
                        <h3>Login to your Account</h3>
                        <hr>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Enter email">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="Password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-success">Login Now</button>
                    </form>
                </div>
                <div class="col-md-6 border p-4">
                    <form action="{{ route('register.submit') }}" method="POST">
                        {{ csrf_field()  }}
                        <h4>Don't have an account ? Pls Register</h4>
                       <hr>
                        <div class="form-group">
                            <input type="text" name="full_name" class="form-control" id="full_name"
                                    placeholder="Enter Full Name" value="{{ old('full_name') }}">
                            @error('full_name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" id="username"
                                    placeholder="Enter User Name"  value="{{ old('username') }}">
                            @error('username')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="email"
                                   aria-describedby="emailHelp" placeholder="Enter email"  value="{{ old('email') }}">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Password">
                            @error('password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" id="password"
                                   placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
