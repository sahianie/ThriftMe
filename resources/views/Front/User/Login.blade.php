@extends('Front.Master.master')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login Page</title>
    @include('Front.Partial.Style')

    <style>
        .container
        {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
        }

        .card
        {
            width: 450px;
            background: 0;
            backdrop-filter: blur(50px)
        }

        body
        {
            background-image: url("https://i.pinimg.com/564x/48/d8/e1/48d8e18a2c8a344a91ba95cf6f51f1bd.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .btn
        {
            border: 2px;
        }

        .navbar-brand-box
        {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="navbar-brand-box" style="text-align: center">
                    <a href="index.html">
                        <span><img src="{{ asset('assets/admin/img/seeker.png') }}" alt="" width="80px"
                                height="40%"></span>
                    </a>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('user.login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label"> <b> Enter Email</b></label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" />
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"> <b> Enter Password </b></label>
                            <input type="password" class="form-control" id="password" name="password"
                                value="{{ old('password') }}" />
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-2 text-center">
                            <button type="submit" class="btn  login-btn btn-block "><b>Submit</b></button>
                        </div>
                    </form>
                    <div class="row">
                        <div class=" col-sm-12 text-center ">
                            <p class="mb-0"> Create an account? <a href="{{ route('signup') }}">
                                    <b>Register</b></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Front.Partial.Script')
</body>

</html>
@endsection
