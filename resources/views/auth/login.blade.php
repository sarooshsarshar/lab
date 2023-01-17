@extends('layouts.auth');
@section('content')
<div class="row h-100">
    <div class="col-12 col-md-10 mx-auto my-auto">
        <div class="card auth-card">
            <div class="position-relative image-side ">

                <p class=" text-white h2">
                    {{ config('app.name') }}
                </p>

                <p class="white mb-0">
                    Please use your credentials to login.
                </p>
            </div>
            <div class="form-side">
               <!-- <a href="{{ route('home') }}">
                    <span ><img src="{{ asset('user_side/images/logo_s.png') }}" alt="image"></span>

                </a> -->
                <h1 class="mb-4">Login</h1>
                <form method="post" action="{{route('login')}}" class="needs-validation tooltip-label-right" novalidate>
                    @csrf
                    <div class="form-group position-relative error-l-50">
                        <label> Email</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" required>
                        <span class="text-danger">{{$errors->first('email')}}</span>
                        <div class="invalid-tooltip">
                            Email Field is required
                        </div>
                    </div>

                    <div class="form-group position-relative error-l-50">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" required />
                        <span class="text-danger">{{$errors->first('password')}}</span>
                        <div class="invalid-tooltip">
                            Password Field is required
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- <a href="#">Forget password?</a> -->
                        <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection